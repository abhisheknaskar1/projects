<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PropertyCategorySeeder::class,
            PropertyCategorySlideSeeder::class,
            CountryIndiaSeeder::class,
            RegionMaharashtraSeeder::class,
            CityPuneSeeder::class,
            CityKhalapurSeeder::class,
            ResidentTypeSeeder::class,
            PropertyLocalitySeeder::class,

            ShapoorjiVanahaSeeder::class,
            RachanaBellaCasaSeeder::class,
            OrnateSeeder::class,
            TwentyFourKAltureKoltePatilSeeder::class,
            MahindraHappinestPropertySeeder::class,
            LodhaMagnusSeeder::class,
            KalpataruJadeSkylineSeeder::class,
            KumarAbilMegapolisSeeder::class,
            RavetkarGroup100PrabhatSeeder::class,
            BasantBaharIconPropertiesSeeder::class,
            SerenityHillsSeeder::class,
            VenkateshErandwaneCentralSeeder::class,

            EvoGreenCityPropertySeeder::class,
            MahindraCitadelSeeder::class,
            KumarPrakrutiSeeder::class,
            KumarRealtyMagnaCitySeeder::class,
            ShapoorjiSensoriumSeeder::class,
            BasilGroupMaximusSeeder::class,
            KumarRealtyLightHouseSeeder::class,
            LivMoRamaGroupSeeder::class,
            KoltePatilLifeRepublicArosSeeder::class,
            KoltePatilLifeRepublicAtmosSeeder::class,
            RohanEkamSeeder::class,
            RavetkarGroupParksideSeeder::class,
            RavetkarGroupAstreaSeeder::class,
            RavetkarGroupKeshavLaxmiSeeder::class,
            MSoulStringsSeeder::class,
            GalaxyVenturesHorizonSeeder::class,
            MajestiqueEvolvusSeeder::class,
            MajestiqueAravaliSeeder::class,
            PethkarSiyonaSeeder::class,
            GCorpGreensSeeder::class,
            MarlinGroupElemanta2Seeder::class,
            LittleEarthSeeder::class,
            SignatureTowerSeeder::class,
            HimgauriSeeder::class,
            MarlinGroupVentanaSeeder::class,
            TwentySevenGrandResidencesSeeder::class,
            KoltaPatilLifeRepublicEspadaSeeder::class,
            GuruprasadKunjSeeder::class,
            AbhishekCoOperativeHousingSocietyLimitedSeeder::class,
            NilayByAngalAndCoSeeder::class,
            DarshanrajRealitySeeder::class,
            AkshaySeeder::class,
            JeevanPradeepSeeder::class,
            GarudHouseApartmentCondominiumSeeder::class,                 
            GarnetMagicHillsSeeder::class,   
            PricingTrendSeeder::class,
        ]);
    }
}
