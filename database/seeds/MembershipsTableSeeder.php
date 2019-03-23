<?php

use Illuminate\Database\Seeder;
use App\Person;

class MembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $people = Person::all();
        $people->map(function ($person){
            factory(\App\Membership::class, mt_rand(1,7))->create([
                'person_id'=> $person->id
            ]);
        });

    }
}
