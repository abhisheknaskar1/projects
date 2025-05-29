<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Enum\SanctionListCode;
use App\Models\SanctionList;
use App\Services\SanctionList\Adapters\Transformers\UkSanctionList;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use XMLReader;

class TheUkSanctionTransform extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:the-uk-sanction-transform';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transform The UK Sanction List XML into Loadable JSON';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $startTime = Carbon::now();
        $assetPath = 'sanction_lists/input/uk-sanction-list.xml';
        if (Storage::disk('local')->exists($assetPath)) {
            $this->info('Asset file exists at '.$assetPath);
            $asset = Storage::disk('local')->path($assetPath);
            $reader = XMLReader::open($asset);
            if ($reader === false) {
                $this->error('Could not open asset file '.$assetPath);
            } else {
                $destination = 'sanction_lists/output/uk-sanction-list.json';
                /** @var \App\Models\SanctionList $sanctionList */
                $sanctionList = SanctionList::query()->where('code', '=', SanctionListCode::UK_SANCTIONS_LIST->value)->firstOrFail();
                $vendorSanctionList = UkSanctionList::transform($sanctionList, $reader);
                $reader->close();
                if (
                    Storage::disk('local')->put($destination, json_encode($vendorSanctionList->toArray(), JSON_PRETTY_PRINT))
                ) {
                    $this->info('Output generated to `'.$destination.'`');
                } else {
                    $this->info('Output could not be generated.');
                }
            }
        } else {
            $this->error('Asset file `'.$assetPath.'` does not exists.');
        }
        $this->info('Total process took '.Carbon::now()->diff($startTime));

        return self::SUCCESS;
    }
}
