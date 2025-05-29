<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Enum\SanctionListCode;
use App\Models\SanctionList;
use App\Services\SanctionList\Adapters\Loaders\Csema;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CsemaLoad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:csema-load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loading transformed Canada Special Economic Measures Act Sanctions List into Database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $startTime = Carbon::now();
        $assetPath = 'sanction_lists/output/canada-sema-lmes.json';
        if (Storage::disk('local')->exists($assetPath)) {
            $this->info('Asset file exists at '.$assetPath);
            $json = Storage::disk('local')->json($assetPath);
            /** @var \App\Models\SanctionList $sanctionList */
            $sanctionList = SanctionList::query()->where('code', '=', SanctionListCode::CA_CONSOLIDATED_SANCTIONS_LIST->value)->firstOrFail();
            DB::transaction(function () use ($json, $sanctionList) {
                $entities = $json['entities'] ?? [];
                foreach ($entities as $entity) {
                    Csema::upsert($sanctionList, $entity);
                }
                $sanctionList->publisher_last_updated_at = $json['publisher_last_updated_at'];
                $sanctionList->save();
            });
            DB::commit();
        } else {
            $this->error('Asset file `'.$assetPath.'` does not exists.');
        }
        $this->info('Total process took '.Carbon::now()->diff($startTime));

        return self::SUCCESS;
    }
}
