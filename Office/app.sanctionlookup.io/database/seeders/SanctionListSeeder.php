<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enum\SanctionListCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SanctionListSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sanctionLists = [
            [
                'code' => SanctionListCode::UN_CONSOLIDATED_LIST->value,
                'title' => 'United Nations Security Council Consolidated Sanctions List',
                'short_title' => 'United Nations Security Council Consolidated Sanctions List',
                'description' => 'The Consolidated List includes individuals and entities subject to Security Council measures, managed by sanctions committees. It facilitates implementation but does not imply uniform listing criteria or that all names belong to the same regime.',
                'publisher' => 'United Nations Security Council',
                'uri' => 'https://main.un.org/securitycouncil/en/content/un-sc-consolidated-list',
            ], [
                'code' => SanctionListCode::SECO_SANCTIONS_LIST->value,
                'title' => 'State Secretariat for Economic Affairs Sanctions List',
                'short_title' => 'State Secretariat for Economic Affairs Sanctions List',
                'description' => 'The SECO sanctions list includes individuals and entities subject to measures imposed by Switzerland. The list facilitates the implementation of sanctions, managed by SECO, with each name listed according to specific criteria relevant to Swiss foreign policy and economic measures.',
                'publisher' => 'State Secretariat for Economic Affairs',
                'uri' => 'https://www.seco.admin.ch/seco/en/home/Aussenwirtschaftspolitik_Wirtschaftliche_Zusammenarbeit/Wirtschaftsbeziehungen/exportkontrollen-und-sanktionen/sanktionen-embargos.html',
            ], [
                'code' => SanctionListCode::OFAC_SDN_LIST->value,
                'title' => 'Office of Foreign Assets Control Specially Designated Nationals (SDN) List',
                'short_title' => 'Office of Foreign Assets Control Specially Designated Nationals (SDN) List',
                'description' => 'The SDN list includes individuals, companies, and entities owned or controlled by, or acting on behalf of, targeted countries, as well as terrorists and narcotics traffickers. Their assets are blocked, and U.S. persons are generally prohibited from dealing with them.',
                'publisher' => 'Office of Foreign Assets Control (OFAC)',
                'uri' => 'https://sanctionslist.ofac.treas.gov/Home/SdnList',
            ], [
                'code' => SanctionListCode::OFAC_CONSOLIDATED_SANCTIONS_LIST->value,
                'title' => 'Office of Foreign Assets Control Consolidated Sanctions List',
                'short_title' => 'Office of Foreign Assets Control Consolidated Sanctions List',
                'description' => 'The Consolidated Sanctions List includes non-SDN sanctions lists in a unified data set. While not part of the SDN List, records may also appear on the SDN List.',
                'publisher' => 'Office of Foreign Assets Control (OFAC)',
                'uri' => 'https://sanctionslist.ofac.treas.gov/Home/ConsolidatedList',
            ], [
                'code' => SanctionListCode::UK_SANCTIONS_LIST->value,
                'title' => 'UK Sanctions List',
                'short_title' => 'UK Sanctions List',
                'description' => 'The UK Sanctions List provides details of individuals, entities, or ships designated under regulations made under the Sanctions Act. It also specifies the sanctions measures that apply and, for UK designations, includes a statement of reasons for the designation.',
                'publisher' => 'Foreign, Commonwealth & Development Office',
                'uri' => 'https://www.gov.uk/government/publications/the-uk-sanctions-list',
            ], [
                'code' => SanctionListCode::EU_CONSOLIDATED_SANCTIONS_LIST->value,
                'title' => 'EU Financial Consolidated Sanctions List',
                'short_title' => 'EU Financial Consolidated Sanctions List',
                'description' => 'The EU consolidated sanctions list includes persons, groups, and entities subject to financial sanctions, particularly the freezing of assets. The European Commission maintains this list, ensuring its accuracy for public and private sectors, especially credit and financial institutions.',
                'publisher' => 'Directorate-General for Financial Stability, Financial Services and Capital Markets Union',
                'uri' => 'https://data.europa.eu/data/datasets/consolidated-list-of-persons-groups-and-entities-subject-to-eu-financial-sanctions?locale=en',
            ], [
                'code' => SanctionListCode::AU_CONSOLIDATED_SANCTIONS_LIST->value,
                'title' => 'Australia Consolidated Sanctions List',
                'short_title' => 'Australia Consolidated Sanctions List',
                'description' => 'The Consolidated List includes persons and entities subject to Australian sanctions laws, targeting financial sanctions and travel bans. It provides details such as names, aliases, birth information, citizenship, and addresses to assist with due diligence checks for compliance.',
                'publisher' => 'Department of Foreign Affairs and Trades',
                'uri' => 'https://www.dfat.gov.au/international-relations/security/sanctions/consolidated-list',
            ], [
                'code' => SanctionListCode::CA_CONSOLIDATED_SANCTIONS_LIST->value,
                'title' => 'Consolidated Canadian Autonomous Sanctions List',
                'short_title' => 'Consolidated Canadian Autonomous Sanctions List',
                'description' => 'The Consolidated Canadian Autonomous Sanctions List includes individuals and entities subject to sanctions under the Special Economic Measures Act (SEMA) and the Justice for Victims of Corrupt Foreign Officials Act (JVCFOA). It is for administrative purposes only and does not have the force of law.',
                'publisher' => 'Government of Canada',
                'uri' => 'https://www.international.gc.ca/world-monde/international_relations-relations_internationales/sanctions/consolidated-consolide.aspx?lang=eng',
            ],
        ];

        foreach ($sanctionLists as $sanctionList) {
            $sanctionList = $sanctionList + [
                'id' => Str::uuid(),
                'is_enabled' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            DB::table('sanction_lists')->insert($sanctionList);
        }
    }
}
