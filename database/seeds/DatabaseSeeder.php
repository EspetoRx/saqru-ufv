<?php

use Illuminate\Database\Seeder;
use App\TipoRefeicao;
use App\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $newuser = new User();
        $newuser->name = "Lucas Carvalho de Oliveira";
        $newuser->email = "lcdo2395@gmail.com";
        $newuser->password = Hash::make('lucas2308');
        $newuser->save();
        $tipo = new TipoRefeicao();
        $tipo->descricao = "Café da Manhã";
        $tipo->id = 1;
        $tipo->save();
        $tipo2 = new TipoRefeicao();
        $tipo2->descricao = "Almoço";
        $tipo2->id = 2;
        $tipo2->save();
        $tipo3 = new TipoRefeicao();
        $tipo3->descricao = "Jantar";
        $tipo3->id = 3;
        $tipo3->save();
    }
}
