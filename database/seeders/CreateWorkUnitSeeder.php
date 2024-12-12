<?php

namespace Database\Seeders;

use App\Models\WorkUnit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateWorkUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workunits = [
            [
               'name'=>'Sekertaris',
            ],

        ];
        foreach ($workunits as $key => $workunit) {
            WorkUnit::create($workunit);
        }
    }
}
