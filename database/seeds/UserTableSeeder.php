<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amounToCreate = 2;

        factory(App\User::class, $amounToCreate)->create()->each(function($u) {
            $u->notebooks()->save(factory(App\Notebook::class)->make())->each(function($notebook){
                $notebook->first()
                    ->notes()->save(factory(App\Note::class)->make())->first()
                    ->noterecords()->save(factory(App\NoteRecord::class)->make());
            });
        });
    }
}
