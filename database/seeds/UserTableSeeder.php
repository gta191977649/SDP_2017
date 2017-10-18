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
        factory(App\User::class, 2)->create()->each(function($u) {
            $u->notebooks()->save(factory(App\Notebook::class)->make())->each(function($notebook){
                $notebook->save(factory(Notebook::class)->make())->first()
                    ->notes()->save(factory(Note::class)->make())->first()
                    ->noterecords()->save(factory(NoteRecord::class)->make());
            });
        });
    }
}
