<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package
use App\Notebook;
class NotebooksController extends Controller
{
    public function index()
    {
    	//return view('notebooks/index'); 
		//$notes = Notebook::all(); //从数据库获取数据
		$user = Auth::user(); // get current login in user
		$note_books = $user->notebooks; // get all notebooks related to this user.

    	//return $notes;
    	return view('notebooks/index')->with('notes',$note_books); //Passing the $note_books to view.
	}
	
	public function create()
	{
		return view('notebooks/create');
	}

	public function store(Request $req) //前端传来的form数据
	{
		$data = $req->all();
		$user = Auth::user(); // get current login in user
		$user->notebooks()->create($data);
		//NoteBook::create($data); //传入数据到Model
		return redirect('../notebooks');
	}

	public function edit($noteID)
	{
		$user = Auth::user;
		$noteData = $user->notebooks()->where('id',$noteID )->first();

		//$noteData = Notebook::where('id',$noteID )->first();//只获取其中一个数据
		//return $noteData;
		return view('notebooks/edit')->with('notebook',$noteData);
	}

	public function update(Request $data,$id)
	{
		//$notebook = Notebook::where('id',$id )->first();
		$user = Auth::user();
		$notebook = $user->notebooks()->where('id',$id )->first();
		$notebook->update($data->all());
		return redirect('../notebooks');
	}

	public function delete($id)
	{
		//找哪个notebok要删除
		$user = Auth::user();
		$notebook = $user->notebooks()->where('id',$id )->first();
		//$notebook = Notebook::where('id',$id )->first();
		$notebook->delete();
		return redirect('../notebooks');
	}
}

