<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class Clube extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\Models\Clube::create([
            'nome_do_clube' => Str::random(10),
        ]);
    }
}
