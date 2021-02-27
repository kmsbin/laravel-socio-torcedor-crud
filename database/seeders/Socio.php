<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class Socio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        \App\Models\Socio::create([
            'nome_completo' => Str::random(10)
        ]);
    }
}
