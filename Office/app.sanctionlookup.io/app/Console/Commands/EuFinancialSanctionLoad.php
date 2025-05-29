<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Enum\SanctionListCode;
use App\Models\SanctionList;
use App\Services\SanctionList\Adapters\Loaders\EuFinancialSanction;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EuFinancialSanctionLoad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:eu-financial-sanction-load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loading transformed EU Financial Sanction List into Database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $startTime = Carbon::now();
        $assetPath = 'sanction_lists/output/eu-financial-sanctions.json';
        if (Storage::disk('local')->exists($assetPath)) {
            $this->info('Asset file exists at '.$assetPath);
            $json = Storage::disk('local')->json($assetPath);
            /** @var \App\Models\SanctionList $sanctionList */
            $sanctionList = SanctionList::query()->where('code', '=', SanctionListCode::EU_CONSOLIDATED_SANCTIONS_LIST->value)->firstOrFail();
            DB::transaction(function () use ($json, $sanctionList) {
                $entities = $json['entities'] ?? [];
                foreach ($entities as $entity) {
                    EuFinancialSanction::upsert($sanctionList, $entity);
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
