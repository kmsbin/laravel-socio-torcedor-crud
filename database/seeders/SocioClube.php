<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocioClube extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\Models\SocioClube::create([
            'id_socio' => 1,
            'id_clube'=> 1,
        ]);
    }
}
