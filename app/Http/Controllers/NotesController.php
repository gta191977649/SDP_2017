<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;
use App\NoteRecord;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
       // $data = $request->all();
        
        //Note::create($data);
        //Create a note base data
        $note = Note::create([
            'notebook_id' => $request->notebook_id
        ]);
        //Created a linked entry record with an secifiy note
        NoteRecord::create([
            'title' => $request->title,
            'body' => $request->body,
            'note_id' => $note->id,
            'reason' => $request->reason
        ]);

        return redirect()->route('notebooks.show',$request->notebook_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $note = Note::find($id)->noterecords;
        return view('notes.view',compact('note'));
    }
   
    public function showHistory($id)
    {

        $historyRecords = NoteRecord::withTrashed()->where('note_id', $id)->orderBy('created_at', 'desc')->get();
        //return $historyRecords->max('created_at');

        return view('notes.history',compact('historyRecords'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //get the note that user want to edit
        $note = Note::find($id);
        //get the latest version of the note 
        $lastVer = $note->noterecords->last();
        //return $lastVer it to the front end;
        return view('notes.edit')->with('note',$lastVer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

     
        $note = Note::find($id);
        //return $note;
        //soft delete the current version
        
        $note->noterecords->first()->delete();
        //Create an new vesion & insert into the noteRecords table
        NoteRecord::create([
            'title' => $request->title,
            'body' => $request->body,
            'note_id' => $note->id,
            'reason' => $request->reason
        ]);
        
        
        //$note->update($data);
        return redirect()->route('notebooks.show',$note->notebook_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find the note that user wish to delete
        $note = Note::find($id);
        //fist soft delete all the children (noteRecords) that is belong to this note
        foreach($note->noterecords as $record)
        {
            $record->delete();
        }
        //finally soft delete its parent.
        $note->delete();
        return redirect()->route('notebooks.show',$note->notebook_id); //Redirect user to notes list view
    }

    public function createNote($notebookID)
    {
        return view('notes/create')->with('id',$notebookID);
    }
}
