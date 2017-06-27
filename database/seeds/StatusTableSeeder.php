<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Status::truncate();
        DB::statement("SET foreign_key_checks=1");
        Status::insert(
            [
                [
                    'id'   => 1,
                    'name' => 'Pendente',
                ],
                [
                    'id'   => 2,
                    'name' => 'Em Desenvolvimento'
                ],
                [
                    'id'   => 3,
                    'name' => 'Em Teste'
                ],
                [
                    'id'   => 4,
                    'name' => 'Concluído'
                ]
            ]
        );
    }
}
