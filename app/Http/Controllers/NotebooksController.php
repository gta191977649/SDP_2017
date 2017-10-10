<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package
use App\Notebook;

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
            print_r("from: " . $parsed->format('Y-m-d') . ' 00:00:00');
            $notebooks->where('created_at', '>=', $parsed->format('Y-m-d') . ' 00:00:00');
        }
        if ($req->has('toDate'))
        {
            $parsed = date_create_from_format("d/m/Y", $data['toDate']);
            print_r("to: " . $parsed->format('Y-m-d') . ' 00:00:00');
            $notebooks->where('created_at', '<=', $parsed->format('Y-m-d') . ' 00:00:00');
        }
        if ($req->has('hidden'))
        {
            $notebooks->where('hidden', '=', $data['hidden']);
        }
        $notebooks->withTrashed();
        $notebooks = $notebooks->get();
        return view('notebooks/index')->with('notes', $notebooks);
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
    public function searchEntry(Request $req,$notebookID)
    {
        $data = $req->all();
        $notebook = NoteBook::withTrashed()->find($notebookID);
        $notes = $notebook->notes()->withTrashed()->get();
         if ($req->has('entryName'))
        {
            $notes->where('name', 'LIKE', '%' . $data['entryName'] . '%');
        }
        if ($req->has('fromDate'))
        {
            $parsed = date_create_from_format("d/m/Y", $data['fromDate']);
            print_r("from: " . $parsed->format('Y-m-d') . ' 00:00:00');
            $notebooks->where('created_at', '>=', $parsed->format('Y-m-d') . ' 00:00:00');
        }
        if ($req->has('toDate'))
        {
            $parsed = date_create_from_format("d/m/Y", $data['toDate']);
            print_r("to: " . $parsed->format('Y-m-d') . ' 00:00:00');
            $notebooks->where('created_at', '<=', $parsed->format('Y-m-d') . ' 00:00:00');
        }

        return view('notes/index')->with('notes', $notes)->with('notebook', $notebook);
    }
}
