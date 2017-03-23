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
                            ['name' => 'Albury'],
                            ['name' => 'Armidale'],
                            ['name' => 'Bathurst'],
                            ['name' => 'Broken Hill'],
                            ['name' => 'Campbelltown'],
                            ['name' => 'Cessnock'],
                            ['name' => 'City of Blue Mountains'],
                            ['name' => 'City Of Lake Macquarie'],
                            ['name' => 'Coffs Harbour'],
                            ['name' => 'Dubbo'],
                            ['name' => 'Gosford'],
                            ['name' => 'Grafton'],
                            ['name' => 'Goulburn'],
                            ['name' => 'Griffith'],
                            ['name' => 'Lismore'],
                            ['name' => 'Lithgow'],
                            ['name' => 'Liverpool'],
                            ['name' => 'Maitland'],
                            ['name' => 'Newcastle'],
                            ['name' => 'Parramatta'],
                            ['name' => 'Penrith'],
                            ['name' => 'Port Macquarie'],
                            ['name' => 'Orange'],
                            ['name' => 'Sydney'],
                            ['name' => 'Tamworth'],
                            ['name' => 'Taree'],
                            ['name' => 'Tweed Heads'],
                            ['name' => 'Queanbeyan'],
                            ['name' => 'Wagga Wagga'],                           
                            ['name' => 'Wollongong'],                                            
                        ],
                    ],
                    [
                        'name' => 'Victoria',
                        'children' => [
                            ['name' => 'Ararat'],
                            ['name' => 'Albury'],
                            ['name' => 'Ballarat'],
                            ['name' => 'Benalla'],
                            ['name' => 'Bendigo'],
                            ['name' => 'Geelong'],
                            ['name' => 'Horsham'],
                            ['name' => 'Melbourne'],
                            ['name' => 'Mildura'],
                            ['name' => 'Morwell'],
                            ['name' => 'Portland'],
                            ['name' => 'Sale'],
                            ['name' => 'Shepparton'],
                            ['name' => 'Swan Hill'],
                            ['name' => 'Traralgon'],
                            ['name' => 'Wangaratta'],
                            ['name' => 'Warrnambool'],
                            ['name' => 'Wodonga'],
                           
                        ],
                    ],
                    [
                        'name' => 'South Australia',
                        'children' => [
                            ['name' => 'Adelaide'],
                            ['name' => 'Mount Gambier'],
                            ['name' => 'Murray Bridge'],
                            ['name' => 'Port Augusta‎'],
                            ['name' => 'Port Lincoln'],
                            ['name' => 'Port Pirie‎'],
                            ['name' => 'Victor Harbor'],
                            ['name' => 'Whyalla'],
                        ],
                    ],
                    [
                        'name' => 'Queensland',
                        'children' => [
                            ['name' => 'Brisbane'],
                            ['name' => 'Bundaberg'],
                            ['name' => 'Cairns‎'],
                            ['name' => 'Caloundra‎'],
                            ['name' => 'Charters Towers'],
                            ['name' => 'Gladstone'],
                            ['name' => 'Gold Coast'],
                            ['name' => 'Gympie'],
                            ['name' => 'Hervey Bay'],
                            ['name' => 'Ipswich'],
                            ['name' => 'Logan City'],
                            ['name' => 'Mackay'],
                            ['name' => 'Maryborough'],
                            ['name' => 'Mount Isa'],
                            ['name' => 'Redland City'],
                            ['name' => 'Rockhampton'],
                            ['name' => 'Toowoomba'],
                            ['name' => 'Townsville'],
                            ['name' => 'Warwick'],
                            ['name' => 'Redcliffe City'],
                        ],
                    ],
                    [
                        'name' => 'Western Australia',
                        'children' => [
                            ['name' => 'Albany'],
                            ['name' => 'Bunbury'],
                            ['name' => 'Busselton'],
                            ['name' => 'Fremantle'],
                            ['name' => 'Geraldton'],
                            ['name' => 'Joondalup'],
                            ['name' => 'Kalgoorlie-Boulder‎‎'],
                            ['name' => 'Karratha'],
                            ['name' => 'Mandurah‎'],
                            ['name' => 'Perth'],
                            ['name' => 'Rockingham'],
                        ],
                    ],
                    [
                        'name' => 'Northern Territory',
                        'children' => [
                            ['name' => 'Alice Springs'],
                            ['name' => 'Darwin'],
                            ['name' => 'Jabiru'],
                            ['name' => 'Katherine'],
                            ['name' => 'Litchfield'],
                            ['name' => 'Palmerston-East Arm'],
                            ['name' => 'Nhulunbuy'],
                            ['name' => 'Tennant Creek'],
                            ['name' => 'Wadeye/Victoria-Daly'],
                            ['name' => 'Yulara'],
                        ],
                    ],
                    [
                        'name' => 'Tasmania',
                        'children' => [
                            ['name' => 'Burnie'],
                            ['name' => 'Clarence'],
                            ['name' => 'Devonport'],
                            ['name' => 'Glenorchy'],
                            ['name' => 'Hobart‎'],
                            ['name' => 'Launceston'],
                        ],
                    ],
                    [
                        'name' => 'ACT',
                        'children' => [
                            ['name' => 'Canberra'],
                        ],
                    ],
                ],
            ],
            [
            'name' => 'New Zealand',
                'children' => [
                    [
                        'name' => 'Auckland',
                    ],
                    [
                        'name' => 'Christchurch',
                    ],
                    [
                        'name' => 'Dunedin',
                    ],
                    [
                        'name' => 'Gisborne',
                    ],
                    [
                        'name' => 'Hamilton',
                    ],
                    [
                        'name' => 'Invercargill',
                    ],
                    [
                        'name' => 'Napier-Hastings',
                    ],
                    [
                        'name' => 'Nelson',
                    ],
                    [
                        'name' => 'New Plymouth',
                    ],
                    [
                        'name' => 'Palmerston North',
                    ],
                    [
                        'name' => 'Rotorua',
                    ],
                    [
                        'name' => 'Tauranga',
                    ],
                    [
                        'name' => 'Wellington',
                    ],
                    [
                        'name' => 'Whanganui',
                    ],
                    [
                        'name' => 'Whangarei',
                    ],
                ],
            ],
        ];

        foreach ($areas as $area) {
            \App\Area::create($area);
        }
        
    }
}
