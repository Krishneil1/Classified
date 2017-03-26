<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            [
                'name' => 'Community',
                'children' => [
                    ['name' => 'Activities'],
                    ['name' => 'Artists'],
                    ['name' => 'Childcare'],
                    ['name' => 'Classes'],
                    ['name' => 'Events'],
                    ['name' => 'General'],
                    ['name' => 'Groups'],
                    ['name' => 'Local news'],
                    ['name' => 'Lost and found'],
                    ['name' => 'Musicians'],
                    ['name' => 'Pets'],
                    ['name' => 'Politics'],
                    ['name' => 'Rideshare'],
                    ['name' => 'Volunteers'],
                ]
            ],
            [
                'name' => 'Personals',
                'children' => [
                    ['name' => 'Strictly platonic'],
                    ['name' => 'Women seeking women'],
                    ['name' => 'Women seeking men'],
                    ['name' => 'Men seeking women'],
                    ['name' => 'Men seeking men'],
                    ['name' => 'Misc romance'],
                    ['name' => 'Casual encounters'],
                    ['name' => 'Missed connections'],
                    ['name' => 'Rants and raves'],
                ]
            ],
            [
                'name' => 'Housing',
                'children' => [
                    ['name' => 'Apartments / housing'],
                    ['name' => 'Housing swap'],
                    ['name' => 'Housing wanted'],
                    ['name' => 'Office / commercial'],
                    ['name' => 'Parking / storage'],
                    ['name' => 'Real estate for sale'],
                    ['name' => 'Rooms / shared'],
                    ['name' => 'Rooms wanted'],
                    ['name' => 'Sublets / temporary'],
                    ['name' => 'Vacation rentals'],
                ]
            ],
            [
                'name' => 'Services',
                'children' => [
                    ['name' => 'Automotive'],
                    ['name' => 'Beauty'],
                    ['name' => 'Computer'],
                    ['name' => 'Creative'],
                    ['name' => 'Trade'],
                    ['name' => 'Write'],
                ]
            ],
            [
                'name' => 'Jobs',
                'children' => [
                    ['name' => 'Accounting'],
                    ['name' => 'Administration'],
                    ['name' => 'Banking And Financial'],
                    ['name' => 'Call Centre'],
                    ['name' => 'Community'],
                    ['name' => 'Construction'],
                    ['name' => 'Consulting'],
                    ['name' => 'Education'],
                    ['name' => 'Engineering'],
                    ['name' => 'Farming'],
                    ['name' => 'Goverment'],
                    ['name' => 'IT'],
                    ['name' => 'Insurance'],
                    ['name' => 'Marketing'],
                    ['name' => 'Mining'],
                    ['name' => 'Real Estate'],
                    ['name' => 'Sales'],
                    ['name' => 'Science and Technology'],
                    ['name' => 'Self Employment'],
                    ['name' => 'Trades'],
                ]
            ],
        ];

        foreach ($categories as $category) {
            \App\Category::create($category);
        }
    }
}
