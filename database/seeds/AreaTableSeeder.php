<?php

use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $areas = [
            [
            'name' => 'Australia',
                'children' => [
                    [
                        'name' => 'New South Wales',
                        'children' => [
                            ['name' => 'Sydney'],
                            ['name' => 'Newcastle - Maitland'],
                            ['name' => 'Wollongong'],
                            ['name' => 'Tweed Heads'],
                            ['name' => 'Coffs Harbour'],
                            ['name' => 'Albury'],
                            ['name' => 'Wagga Wagga'],
                            ['name' => 'Port Macquarie'],
                            ['name' => 'Tamworth'],
                            ['name' => 'Orange'],
                        ],
                    ],
                    [
                        'name' => 'Victoria',
                        'children' => [
                            ['name' => 'Melbourne'],
                            ['name' => 'Geelong'],
                            ['name' => 'Bendigo'],
                            ['name' => 'Shepparton - Mooroopna'],
                        ],
                    ],
                    [
                        'name' => 'South Australia',
                        'children' => [
                            ['name' => 'Flagstaff / Sedona'],
                            ['name' => 'Mohave County'],
                            ['name' => 'Phoenix'],
                            ['name' => 'Prescott'],
                            ['name' => 'Show Low'],
                            ['name' => 'Sierra Vista'],
                            ['name' => 'Tucson'],
                            ['name' => 'Yuma'],
                        ],
                    ],
                    [
                        'name' => 'Queensland',
                        'children' => [
                            ['name' => 'Fayetteville'],
                            ['name' => 'Fort Smith'],
                            ['name' => 'Jonesboro'],
                            ['name' => 'Little Rock'],
                            ['name' => 'Texarkana'],
                        ],
                    ],
                    [
                        'name' => 'Western Australia',
                        'children' => [
                            ['name' => 'Bakersfield'],
                            ['name' => 'Chico'],
                            ['name' => 'Fresno / Madera'],
                            ['name' => 'Gold Country'],
                            ['name' => 'Hanford-Corcoran'],
                            ['name' => 'Humboldt County'],
                            ['name' => 'Inland Empire'],
                            ['name' => 'Los Angeles'],
                            ['name' => 'Mendocino County'],
                            ['name' => 'Merced'],
                            ['name' => 'Modesto'],
                            ['name' => 'Monterey Bay'],
                            ['name' => 'Orange County'],
                            ['name' => 'Palm Springs'],
                            ['name' => 'Redding'],
                            ['name' => 'Sacramento'],
                            ['name' => 'San Diego'],
                            ['name' => 'San Francisco Bay Area'],
                            ['name' => 'San Luis Obispo'],
                            ['name' => 'Santa Barbara'],
                            ['name' => 'Santa Maria'],
                            ['name' => 'Siskiyou County'],
                            ['name' => 'Stockton'],
                            ['name' => 'Susanville'],
                            ['name' => 'Ventura County'],
                            ['name' => 'Visalia-Tulare'],
                            ['name' => 'Yuba-Sutter'],
                        ],
                    ],
                    [
                        'name' => 'Northern Territory',
                        'children' => [
                            ['name' => 'Bakersfield'],
                            ['name' => 'Chico'],
                            ['name' => 'Fresno / Madera'],
                            ['name' => 'Gold Country'],
                            ['name' => 'Hanford-Corcoran'],
                            ['name' => 'Humboldt County'],
                            ['name' => 'Inland Empire'],
                            ['name' => 'Los Angeles'],
                            ['name' => 'Mendocino County'],
                            ['name' => 'Merced'],
                            ['name' => 'Modesto'],
                            ['name' => 'Monterey Bay'],
                            ['name' => 'Orange County'],
                            ['name' => 'Palm Springs'],
                            ['name' => 'Redding'],
                            ['name' => 'Sacramento'],
                            ['name' => 'San Diego'],
                            ['name' => 'San Francisco Bay Area'],
                            ['name' => 'San Luis Obispo'],
                            ['name' => 'Santa Barbara'],
                            ['name' => 'Santa Maria'],
                            ['name' => 'Siskiyou County'],
                            ['name' => 'Stockton'],
                            ['name' => 'Susanville'],
                            ['name' => 'Ventura County'],
                            ['name' => 'Visalia-Tulare'],
                            ['name' => 'Yuba-Sutter'],
                        ],
                    ],
                    [
                        'name' => 'Tasmania',
                        'children' => [
                            ['name' => 'Bakersfield'],
                            ['name' => 'Chico'],
                            ['name' => 'Fresno / Madera'],
                            ['name' => 'Gold Country'],
                            ['name' => 'Hanford-Corcoran'],
                            ['name' => 'Humboldt County'],
                            ['name' => 'Inland Empire'],
                            ['name' => 'Los Angeles'],
                            ['name' => 'Mendocino County'],
                            ['name' => 'Merced'],
                            ['name' => 'Modesto'],
                            ['name' => 'Monterey Bay'],
                            ['name' => 'Orange County'],
                            ['name' => 'Palm Springs'],
                            ['name' => 'Redding'],
                            ['name' => 'Sacramento'],
                            ['name' => 'San Diego'],
                            ['name' => 'San Francisco Bay Area'],
                            ['name' => 'San Luis Obispo'],
                            ['name' => 'Santa Barbara'],
                            ['name' => 'Santa Maria'],
                            ['name' => 'Siskiyou County'],
                            ['name' => 'Stockton'],
                            ['name' => 'Susanville'],
                            ['name' => 'Ventura County'],
                            ['name' => 'Visalia-Tulare'],
                            ['name' => 'Yuba-Sutter'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($areas as $area) {
            \App\Area::create($area);
        }
        
    }
}
