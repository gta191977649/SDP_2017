<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Notebook;
use App\Note;
use App\NoteRecord;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EntryTest extends TestCase
{
    use DatabaseMigrations;

    //New Journal Test
    /** @test */
    public function createNewJournalEntry(){
        $user = factory(User::class)->create();
        $notebooks = $user->notebooks();
        $notebooks->save(factory(Notebook::class)->make())->first()
            ->notes()->save(factory(Note::class)->make())->first()
            ->noterecords()->save(factory(NoteRecord::class)->make());


        $this->assertEquals(1, $notebooks->first()->notes()->count());
    }

    //Create 10 Journals
    /** @test */
    public function createNewMultipleJournalEntry(){
        $users = factory(User::class,10)->create();
        $count = 0;

        $users->each(function($user){
            $notebooks = $user->notebooks();

            $notebooks->save(factory(Notebook::class)->make())->first()
                ->notes()->save(factory(Note::class)->make())->first()
                ->noterecords()->save(factory(NoteRecord::class)->make());
        });

        foreach($users as $user){
            $notebook = $user->notebooks()->first();
            $notes = $notebook->notes();
            $count += $notes->count();
        }

        $this->assertEquals(10, $count);
    }

    //Hidden Journal Test
    /** @test */
    public function hideJournal(){
        $user = factory(User::class)->create();
        $notebooks = $user->notebooks();

        $notebooks->save(factory(Notebook::class)->make())->each(function($notebook){
            $notebook->notes()->save(factory(Note::class)->make())->each(function($note){
                $note->noterecords()->save(factory(NoteRecord::class)->make());
            });
        });

        $note = $notebooks->first()->notes()->first();
        $isHidden = $note->isHide();

        $note->setHide(!$isHidden);
        $hiddenNotes = $notebooks->first()->notes()->where('hide','=','1')->first()->count();

        $this->assertEquals(1, $hiddenNotes);
    }


    //Hidden Journal Test
    /** @test */
    public function editEntries(){
        $user = factory(User::class)->create();
        $notebooks = $user->notebooks();

        $notebooks->save(factory(Notebook::class)->make())->each(function($notebook){
            $notebook->notes()->save(factory(Note::class)->make())->each(function($note){
                $note->noterecords()->save(factory(NoteRecord::class)->make());
            });
        });
        $notebook = $notebooks->first();
        $note = $notebook->notes()->first();

        $noteTemp = factory(Note::class)->create([
            'notebook_id' => $notebook->id,
        ]);

        $note->update(array($noteTemp));

        $editedNotes = $notebooks->first()->notes()->first()->noterecords()->count();

        $this->assertEquals(1, $editedNotes);
    }

    //Delete a journal entry
    /** @test */
    public function deleteEntry(){
        $user = factory(User::class)->create();
        $notebooks = $user->notebooks();

        $notebooks->save(factory(Notebook::class)->make())->each(function($notebook){
            $notebook->notes()->save(factory(Note::class)->make())->each(function($note){
                $note->noterecords()->save(factory(NoteRecord::class)->make());
            });
        });

        $note = $notebooks->first()->notes()->first();
        //fist soft delete all the children (noteRecords) that is belong to this note
        foreach ($note->noterecords as $record)
        {
            $record->delete();
        }
        //finally soft delete its parent.
        $note->delete();
        $delcount = 0;
        do{
            $delcount++;
        }while(!$note->trashed());

        $this->assertEquals(1, $delcount);
    }
}
