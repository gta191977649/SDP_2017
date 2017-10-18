<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package
use Illuminate\Support\Facades\DB;
use App\Notebook;
use App\Note;
use Log;

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

    public function hide($id)
    {
        $user = Auth::user();
        $notebook = $user->notebooks()->where('id', $id)->first();
        $hidden = $notebook->hide;
        $notebook->hide = !$hidden;
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
            Log::info($data['fromDate']);
            $notebooks->where('created_at', '>=', $parsed->format('Y-m-d') . ' 00:00:00');
        }
        if ($req->has('toDate'))
        {
            $parsed = date_create_from_format("d/m/Y", $data['toDate']);
            Log::info($data['toDate']);
            $notebooks->where('created_at', '<=', $parsed->format('Y-m-d') . ' 00:00:00');
        }
        //Don't show deleted journals
        $notebooks->where('deleted', '0');

        if ($req->has('hidden'))
        {
            $notebooks->where('hide', $data['hidden']);
        } else
        {
            $notebooks->where('hide', '0');
        }



        $notebooks = $notebooks->get();
        return view('notebooks.search')->with('notes', $notebooks);
    }

    public function show($id, $allEntries = false)
    {
        $notebook = NoteBook::withTrashed()->find($id);
        $notes = $notebook->notes();
        if ($allEntries)
        {
            $notes = $notes->withTrashed();
        } else
        {
            $notes = $notes->whereNull('deleted_at');
        }
        $notes = $notes->where('hide', '!=', '1');
        $notes = $notes->orderBy('created_at', 'desc')->get();
        //return $notes;
        //return $notes->find(1)->noterecords;
        //$n = $notes->find(2)->noterecords->first();
        //$notes->find(2)->noterecords->first()->title;
        //return $n->created_at;
        return view('notes/index')->with('notes', $notes)->with('notebook', $notebook)->with('active', !$allEntries)->with('searching', false);
    }

    public function searchEntry(Request $req, $notebookID)
    {
        $data = $req->all();
        $notebook = NoteBook::withTrashed()->find($notebookID);
        $NID = $notebookID;
        $query = "select n.id as NoteID, r.id as Record from notes n
                                        join noterecords r on n.id = r.note_id
                                        where r.id = (select max(id) from noterecords where note_id = n.id)"
                . "and n.notebook_id = :NID ";
        if ($req->has('hidden'))
        {
            if ($data['hidden'] == 1)
            {
                $query = $query . " or n.hide = 1";
            }
        }
        if ($req->has('deleted'))
        {
            if ($data['deleted'] == 1)
            {
                $query = $query . " or n.deleted_at is not null";
            }
        }
        $query = $query . ';';
        $results = DB::select(DB::raw($query), array('NID' => $NID));
        $recordIDs = array();
        foreach ($results as $r)
        {
            $recordIDs[] = $r->Record;
        }
        $noterecords = DB::table('noterecords')->whereIn('id', $recordIDs);

        if ($req->has('entryKeywords'))
        {
            $keywords = explode(' ', $data['entryKeywords']);
            foreach ($keywords as $keyword)
            {
                $noterecords->Where('title', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('body', 'LIKE', '%' . $keyword . '%');
            }
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

        foreach ($ress as $record)
        {
            //Get the note object for each record found
            $noteIDs[] = $record->note_id;
        }
        
        $notes = Note::whereIn('id', $noteIDs);
        
        if ($req->has('hidden'))
        {
            if ($data['hidden'] == 1)
            {
                $notes = $notes->orWhere('hide', '=', '1');
            } else
            {
                $notes = $notes->where('hide', '!=', '1');
            }
        } else
        {
            $notes = $notes->where('hide', '!=', '1');
        }

        if ($req->has('deleted'))
        {
            if ($data['deleted'] == 1)
            {
                $notes = $notes->withTrashed();
            }
        }

        $notes = $notes->orderBy('created_at', 'desc')->get();
        return view('notes/index')->with('notes', $notes)->with('notebook', $notebook)->with('searching', true)->with('active', false);
    }

}
