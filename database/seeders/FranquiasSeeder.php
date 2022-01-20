<?php

namespace Database\Seeders;

use App\Models\Franquia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FranquiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('franquias')->insert([
        //     'nomeComercial' => 'Relton Fidelis',
        //     'cnpj' => '07487884414',
        //     'created_at' => date('Y-m-d h:m:i'),
        //     'updated_at' => date('Y-m-d h:m:i'),
        // ]);

        Franquia::create([
            'nomeComercial' => 'Relton Fidelis',
            'cnpj' => '07487884414',
        ]);
    }
}
