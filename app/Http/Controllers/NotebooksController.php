<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package
use Illuminate\Support\Facades\DB;
use App\Notebook;
use App\Note;

class NotebooksController extends Controller {

    public function index()
    {
//return view('notebooks/index');
//$notes = Notebook::all(); //从数据库获取数据
        $user = Auth::user(); // get current login in user
        $note_books = $user->notebooks()->withTrashed()->get(); // get all notebooks related to this user.
//return $notes;
        return view('notebooks/index')->with('notes', $note_books); //Passing the $note_books to view.
    }

    public function create()
    {
        return view('notebooks/create');
    }

    public function store(Request $req) //前端传来的form数据
    {
        $data = $req->all();
        $user = Auth::user(); // get current login in user
        $data['hidden'] = 0;
        $user->notebooks()->create($data);
//NoteBook::create($data); //传入数据到Model
        return redirect('../notebooks');
    }

    public function update(Request $data, $id)
    {
//$notebook = Notebook::where('id',$id )->first();
        $user = Auth::user();
        $notebook = $user->notebooks()->where('id', $id)->first();
        $notebook->update($data->all());
        return redirect('../notebooks');
    }

    public function delete($id)
    {

        $user = Auth::user();
        $notebook = $user->notebooks()->where('id', $id)->first();
        //$notebook = Notebook::where('id',$id )->first();

        $notebook->deleted = 1;
        $notebook->save();

        $notebook->delete();
        return redirect('../notebooks');
    }

    public function loadEditModal($id)
    {
        $user = Auth::user();
        $notebook = $user->notebooks()->where('id', $id)->first();
        return view('notebooks/modal-rename', ['notebook' => $notebook]);
    }

    public function loadCreateModal()
    {
        $user = Auth::user();
        return view('notebooks/modal-create');
    }

    public function hide($id){
        $user = Auth::user();
        $notebook = $user->notebooks()->where('id', $id)->first();
        $hidden = $notebook->hidden;
        $notebook->hidden = !$hidden;
        $notebook->save();

        return back();

    }

    public function search(Request $req)
    {
        $data = $req->all();
        $user = Auth::user(); // get current login in user
        $notebooks = $user->notebooks();
        if ($req->has('journalName'))
        {
            $notebooks->where('name', 'LIKE', '%' . $data['journalName'] . '%');
        }
        if ($req->has('fromDate'))
        {
            $parsed = date_create_from_format("d/m/Y", $data['fromDate']);
            $notebooks->where('created_at', '>=', $parsed->format('Y-m-d') . ' 00:00:00');
        }
        if ($req->has('toDate'))
        {
            $parsed = date_create_from_format("d/m/Y", $data['toDate']);
            $notebooks->where('created_at', '<=', $parsed->format('Y-m-d') . ' 00:00:00');
        }
        if ($req->has('hidden')){
            $notebooks->where('hidden', '=', $data['hidden']);
        }
        $notebooks->withTrashed();
        $notebooks = $notebooks->get();
        return view('notebooks.search')->with('notes', $notebooks);
    }

    public function show($id)
    {
        $notebook = NoteBook::withTrashed()->find($id);

//$notes = $notebook->notes;
        $notes = $notebook->notes()->withTrashed()->get();
//return $notes;
//return $notes->find(1)->noterecords;
//$n = $notes->find(2)->noterecords->first();
//$notes->find(2)->noterecords->first()->title;
//return $n->created_at;
        return view('notes/index')->with('notes', $notes)->with('notebook', $notebook);
    }

    public function searchEntry(Request $req, $notebookID)
    {
        $data = $req->all();
        $notebook = NoteBook::withTrashed()->find($notebookID);
        $NID = $notebookID;
        $results = DB::select(DB::raw("select n.id as NoteID, r.id as Record from notes n
                                        join noterecords r on n.id = r.note_id
                                        where r.id = (select max(id) from noterecords where note_id = n.id)
                                        and n.notebook_id = :NID;"), array('NID' => $NID));
        $recordIDs = array();
        foreach ($results as $r)
        {
            $recordIDs[] = $r->Record;
        }
        $noterecords = DB::table('noterecords')->whereIn('id',$recordIDs);
        if ($req->has('entryName'))
        {
            $noterecords->where('title', 'LIKE', '%' . $data['entryName'] . '%');
        }
        if ($req->has('fromDate'))
        {
            $parsed = date_create_from_format("d/m/Y", $data['fromDate']);
            $noterecords->where('created_at', '>=', $parsed->format('Y-m-d') . ' 00:00:00');
        }
        if ($req->has('toDate'))
        {
            $parsed = date_create_from_format("d/m/Y", $data['toDate']);
            $noterecords->where('created_at', '<=', $parsed->format('Y-m-d') . ' 00:00:00');
        }
        $ress = $noterecords->get();
        $noteIDs = array();

        foreach($ress as $record)
        {
            //Get the note object for each record found
            $noteIDs[] =  $record->note_id;
        }
        $notes = Note::whereIn('id', $noteIDs)->get();
        return view('notes/index')->with('notes', $notes)->with('notebook', $notebook);
    }

}
