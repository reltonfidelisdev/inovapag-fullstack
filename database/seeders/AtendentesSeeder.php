<?php

namespace Database\Seeders;

use App\Models\Atendente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtendentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('atendentes')->insert([
        //     'nomeAtendente' => 'Favio Rian',
        //     'franquia_id' => 1,
        //     'created_at' => date('Y-m-d h:m:i'),
        //     'updated_at' => date('Y-m-d h:m:i'),

        // ]);

        Atendente::create([
            'nomeAtendente' => 'Favio Rian',
            'franquia_id' => 1,
        ]);
    }
}
