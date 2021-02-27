<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        $this->call([
            Socio::class,
            Clube::class,
            SocioClube::class,
        ]);

        // DB::table('socios')->insert([
        //     'nome_completo' => Str::random(10),
        // ]);
        // \App\Models\User::factory(10)->create();
    }
}
