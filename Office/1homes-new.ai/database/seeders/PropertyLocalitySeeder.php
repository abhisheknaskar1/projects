<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyLocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'baner',
            'title' => 'Baner',
            'description' => 'A glance at the map shows why Baner is considered such a great location. It is placed in a geographical sweet spot, which facilitates equal access to Pune’s many thriving neighbourhoods.

Celebrate the morning glory with the rising Sun being welcomed by cheerful chirping of rare species of birds. Befriend with the neighbouring Pashan & Baner hills and the mesmerising views. Unleash the birdwatcher and the nature-trotter in you. Explore various trails inviting from different directions.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'hinjawadi-phase-3',
            'title' => 'Hinjawadi Phase 3',
            'description' => 'Experience the pulse of Pune\'s IT hub in Hinjawadi Phase 3, a rapidly growing residential and commercial destination. Renowned for its proximity to major tech parks, this vibrant locale offers a plethora of opportunities for modern living. Explore a wide range of residential options, from contemporary apartments to spacious villas, catering to diverse needs and budgets. Enjoy seamless connectivity to Pune\'s major hubs via well-developed road networks and upcoming metro lines.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'deccan-gymkhana',
            'title' => 'Deccan Gymkhana',
            'description' => 'Discover the vibrant heart of Pune in Erandwane, a sought-after residential haven with a rich cultural heritage. Enjoy unparalleled convenience with renowned educational institutions, bustling commercial centers, and serene green spaces at your doorstep. Experience the perfect blend of tradition and modernity in this well-connected and thriving locale. Your ideal home awaits in Erandwane.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'hinjewadi-phase-1',
            'title' => 'Hinjewadi Phase 1',
            'description' => 'Hinjawadi Phase 1, located in the heart of Pune\'s IT hub, is a bustling micro-market that has witnessed unprecedented growth in recent years. This vibrant locale is a magnet for young professionals and tech enthusiasts, thanks to its proximity to major IT parks and corporate offices. The area boasts a thriving social infrastructure with a plethora of restaurants, cafes, and entertainment options, ensuring a dynamic and fulfilling lifestyle.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'punawale',
            'title' => 'Punawale',
            'description' => 'The Basil Group focuses on real estate, developing homes and offices that improve cities. They ensure their buildings are high quality, modern, and comfortable. Their projects help make neighborhoods better places to live and work. The Basil Group’s real estate work is key to enhancing communities.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'bhugaon-mulshi',
            'title' => 'Bhugaon, Mulshi',
            'description' => 'Bhugaon is one of the most promising suburbs of Pune, teeming with upcoming residential projects. With seamless connectivity to all major highways as well as the city area, you get to live connected to the city while enjoying a peaceful retreat away from it.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'tathawade',
            'title' => 'Tathawade',
            'description' => 'Experience the charm of modern living in Jeevan Nagar, a rapidly developing residential haven nestled in the heart of Tathawade, Pune. Enjoy seamless connectivity to major IT hubs, educational institutions, and lifestyle destinations. Discover a thriving community with well-planned infrastructure, upcoming commercial centers, and serene green spaces. Choose from a variety of affordable and well-designed residential projects, catering to diverse needs and budgets. Your dream home awaits in Jeevan Nagar, a promising destination for a comfortable and convenient lifestyle.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'bavdhan',
            'title' => 'Bavdhan',
            'description' => 'Experience the charm of modern living in Jeevan Nagar, a rapidly developing residential haven nestled in the heart of Tathawade, Pune. Enjoy seamless connectivity to major IT hubs, educational institutions, and lifestyle destinations. Discover a thriving community with well-planned infrastructure, upcoming commercial centers, and serene green spaces. Choose from a variety of affordable and well-designed residential projects, catering to diverse needs and budgets. Your dream home awaits in Jeevan Nagar, a promising destination for a comfortable and convenient lifestyle.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'baner-sus',
            'title' => 'Baner Sus',
            'description' => 'Baner-Sus Road, situated in the northwestern part of Pune, is an emerging real estate hotspot known for its serene surroundings, excellent connectivity, and promising growth prospects. This thriving corridor connects the well-established suburb of Baner to the developing area of Sus, offering a blend of urban convenience and tranquil living.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'balewadi',
            'title' => 'Balewadi',
            'description' => 'Balewadi, strategically located near major IT hubs in Pune, offers excellent connectivity and a thriving social infrastructure. Its diverse housing options cater to various budgets, while the presence of the Shree Shiv Chhatrapati Sports Complex adds a unique appeal. Balewadi High Street provides a vibrant shopping and dining experience, and the nearby Baner Pashan Biodiversity Park and Pashan Lake offer a tranquil retreat. With its blend of urban convenience and natural beauty, Balewadi is a sought-after destination for residents and businesses alike.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'pashan',
            'title' => 'Pashan',
            'description' => 'Pashan stands out as an attractive destination for home buying and investment due to its proximity to major IT hubs like Hinjewadi, excellent connectivity via the Mumbai-Pune Expressway, and the presence of reputed educational institutions. The area\'s green environment, highlighted by Pashan Lake, along with rapid development and a high quality of life, makes it a desirable and promising location for residents and investors alike.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'pimpri-chinchwad',
            'title' => 'Pimpri-Chinchwad',
            'description' => 'Experience a thriving urban lifestyle in Pimpri-Chinchwad, a bustling hub in Pune\'s northwestern corridor. Renowned for its industrial prowess and rapid development, this vibrant city offers a plethora of opportunities for modern living. Explore a wide range of residential options, from affordable apartments to luxurious villas, catering to diverse needs and budgets. Enjoy easy access to renowned educational institutions, healthcare facilities, and entertainment destinations.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'ideal-colony-kothrud',
            'title' => 'Ideal Colony, Kothrud',
            'description' => 'Experience the epitome of urban living in Ideal Colony, Kothrud\'s most sought-after residential haven.  Embrace a culturally rich and serene neighborhood, boasting seamless connectivity to Bavdhan, the highway, Deccan, and beyond. Indulge in a harmonious blend of urban convenience and tranquil living, with easy access to essential amenities, renowned educational institutions, and thriving commercial hubs.

    With the upcoming Pune Metro station just 7 minutes away, your connectivity will be further enhanced, offering effortless access to every corner of the city.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'erandwane',
            'title' => 'Erandwane',
            'description' => 'Experience the epitome of urban living in Anand Park, a serene haven nestled in the heart of Aundh, Pune. Renowned for its upscale ambiance, lush greenery, and tranquil surroundings, Anand Park offers a perfect blend of convenience and exclusivity. Explore a variety of residential options, from spacious apartments to elegant villas, designed to cater to discerning tastes. Enjoy easy access to renowned educational institutions, healthcare facilities, and vibrant commercial centers. Embrace a sophisticated lifestyle in Anand Park, where tranquility meets modern convenience.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'dehu',
            'title' => 'Dehu',
            'description' => 'Dehu offers the perfect blend of tranquility and convenience. Embrace a vibrant community surrounded by lush greenery, historical landmarks, and modern amenities. Experience the charm of Dehu Road\'s bustling markets and seamless connectivity to Pune\'s urban hubs. Your peaceful haven awaits.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'manjari-budruk',
            'title' => 'Manjari Budruk',
            'description' => 'Experience the best of both worlds in Manjari Budruk, a burgeoning suburb in Pune\'s east. Enjoy seamless connectivity to major IT hubs, educational institutions, and lifestyle destinations. Discover a thriving community with modern amenities, lush green spaces, and a well-planned infrastructure. Your dream home awaits in this vibrant and rapidly developing locale.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'hadapsar',
            'title' => 'Hadapsar',
            'description' => 'Discover a thriving urban lifestyle in Hadapsar, Pune\'s eastern gem. Enjoy seamless connectivity to major IT hubs, educational institutions, and lifestyle destinations. Experience a vibrant community with modern amenities, diverse residential options, and a rapidly expanding infrastructure. Your dream home awaits in this dynamic and well-connected locale.',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'kharadi',
            'title' => 'Kharadi',
            'description' => 'Kharadi, located in the eastern corridor of Pune, has transformed from a quiet suburb into a bustling IT and residential hub. Its strategic location near the airport and major IT parks, coupled with a growing social infrastructure,',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'warje',
            'title' => 'Warje',
            'description' => 'Warje is a serene haven amidst urban development, featuring lush greenery that combats pollution. Despite its proximity to key areas like Nano Space IT Park and the airport, Warje maintains its peaceful charm, offering a retreat from the city\'s hustle. This blend of nature and modernity reflects Pune\'s commitment to preserving its natural heritage.',
            'updated_at' => Carbon::now(),
        ]);

        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'thergaon',
            'title' => 'Thergaon',
            'description' => 'Thergaon offers a perfect blend of connectivity, infrastructure, and growth potential, making it an ideal location for real estate investments. Whether you are looking for a residential haven or a commercial opportunity, Thergaon promises a thriving and prosperous future. Invest in Thergaon today and be part of its exciting growth journey.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'wakad',
            'title' => 'Wakad',
            'description' => 'Wakad, with its strategic location, modern infrastructure, and promising investment potential, is a prime choice for real estate investments. Whether you are looking to buy a home, set up an office, or invest in commercial properties, Wakad offers a thriving environment that caters to all your needs. Embrace the future of urban living and smart investments in Wakad.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'kiwale-mamurdi-road',
            'title' => 'Kiwale Mamurdi Road',
            'description' => 'Kiwale-Mamurdi Road represents the perfect blend of modernity and convenience, making it an ideal choice for real estate investments. Whether you are looking for a place to call home or seeking a lucrative commercial venture, this location offers unparalleled opportunities for growth and prosperity. Invest in Kiwale-Mamurdi Road today and be part of a thriving future.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'mauje-dapoli',
            'title' => 'Mauje Dapoli',
            'description' => 'Serenity Hills offers the perfect blend of seclusion and accessibility, located just 5 km from the city centre. Daily conveniences like grocery stores are only a 5-minute drive away, ensuring your essential needs are always within reach. For leisure, unwind at beautiful beaches and heritage sites, all just a 30-minute drive from your doorstep.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'marunji',
            'title' => 'Marunji',
            'description' => 'Serenity Hills offers the perfect blend of seclusion and accessibility, located just 5 km from the city centre. Daily conveniences like grocery stores are only a 5-minute drive away, ensuring your essential needs are always within reach. For leisure, unwind at beautiful beaches and heritage sites, all just a 30-minute drive from your doorstep.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'prabhat-road',
            'title' => 'Prabhat Road',
            'description' => 'Discover a vibrant lifestyle in Erandwane, a sought-after residential haven located along the bustling Karve Road in Pune. Renowned for its prestigious educational institutions, bustling commercial centers, and serene green spaces, Erandwane offers a perfect blend of convenience and cultural richness. Explore a wide range of residential options, from cozy apartments to spacious family homes, catering to diverse needs and budgets. Enjoy easy access to renowned hospitals, entertainment hubs, and transportation links. Embrace a dynamic and fulfilling lifestyle in Erandwane, where everything you need is at your doorstep.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'bhandarkar-road',
            'title' => 'Bhandarkar Road',
            'description' => 'Investing in Bhandarkar Road means securing a piece of Pune\'s most prestigious and dynamic locality. With its strategic location, excellent infrastructure, and promising growth prospects, Bhandarkar Road is undeniably an ideal destination for both residential and commercial real estate investments. Whether you are looking to live amidst luxury or grow your business in a thriving environment, Bhandarkar Road offers unmatched opportunities.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'model-colony',
            'title' => 'Model Colony',
            'description' => 'Model Colony, a prestigious residential area in the heart of Pune, is known for its serene ambiance, tree-lined streets, and elegant heritage bungalows. Its prime location offers easy access to commercial centers, educational institutions, and hospitals. The area boasts a peaceful environment with a strong sense of community, hosting various social and cultural events.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'bhoslenagar',
            'title' => 'Bhoslenagar',
            'description' => 'Experience the essence of Pune in Bhoslenagar, a vibrant neighborhood nestled in the heart of Shivaji Nagar. Enjoy seamless connectivity to major hubs, prestigious educational institutions, bustling commercial centers, and serene green spaces. Discover a thriving community with a rich cultural heritage and modern amenities. Your ideal home awaits in Bhoslenagar, where convenience and charm meet.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('property_localities')->insert([
            'id' => Str::uuid(),
            'code' => 'ambivali-village',
            'title' => 'Ambivali Village',
            'description' => 'Find peace & quiet in Khalapur. Enjoy breathtaking views and fresh air, yet stay connected to Mumbai & Navi Mumbai. Ideal for weekend getaways or a permanent retreat. Be part of a growing community with convenient access to amenities. This scenic location offers both tranquility and investment potential.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
