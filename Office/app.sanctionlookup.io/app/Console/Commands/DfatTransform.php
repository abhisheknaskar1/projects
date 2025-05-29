<?php

namespace App\Console\Commands;

use App\Enum\SanctionListCode;
use App\Models\SanctionList;
use App\Services\SanctionList\Adapters\Transformers\Dfat;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class DfatTransform extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dfat-transform';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transform Australian DFAT Sanctions List CSV into Loadable JSON';

    /**
     * Execute the console command.
     *
     * @throws \League\Csv\UnavailableStream|\League\Csv\Exception
     */
    public function handle(): int
    {
        $startTime = Carbon::now();
        $assetPath = 'sanction_lists/input/dfat.csv';
        if (Storage::disk('local')->exists($assetPath)) {
            $this->info('Asset file exists at '.$assetPath);
            $asset = Storage::disk('local')->path($assetPath);
            $reader = Reader::createFromPath($asset);
            $destination = 'sanction_lists/output/dfat.json';
            /** @var \App\Models\SanctionList $sanctionList */
            $sanctionList = SanctionList::query()->where('code', '=', SanctionListCode::AU_CONSOLIDATED_SANCTIONS_LIST->value)->firstOrFail();
            $vendorSanctionList = Dfat::transform($sanctionList, $reader);
            if (
                Storage::disk('local')->put($destination, json_encode($vendorSanctionList->toArray(), JSON_PRETTY_PRINT))
            ) {
                $this->info('Output generated to `'.$destination.'`');
            } else {
                $this->info('Output could not be generated.');
            }
        } else {
            $this->error('Asset file `'.$assetPath.'` does not exists.');
        }
        $this->info('Total process took '.Carbon::now()->diff($startTime));

        return self::SUCCESS;
    }
}
