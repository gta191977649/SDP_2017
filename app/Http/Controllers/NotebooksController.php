<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notebook;
class NotebooksController extends Controller
{
    public function index()
    {
    	//return view('notebooks/index'); 
    	$notes = Notebook::all(); //从数据库获取数据
    	//return $notes;
    	return view('notebooks/index',compact('notes')); //向View传入$Notes里面的数据
	}
	
	public function create()
	{
		return view('notebooks/create');
	}

	public function store(Request $req) //前端传来的form数据
	{
		$data = $req->all();
	
		/*
		$note = new NoteBook();
		$note->create($data);
		$note->name =  $req['name'];
		$note->save();
		*/
		NoteBook::create($data); //传入数据到Model
		return redirect('../notebooks');
	}

	public function edit($noteID)
	{
		$noteData = Notebook::where('id',$noteID )->first();//只获取其中一个数据
		//return $noteData;
		return view('notebooks/edit')->with('notebook',$noteData);
	}

	public function update(Request $data,$id)
	{
		$notebook = Notebook::where('id',$id )->first();
		$notebook->update($data->all());
		return redirect('../notebooks');
	}

	public function delete($id)
	{
		//找哪个notebok要删除
		$notebook = Notebook::where('id',$id )->first();
		$notebook->delete();
		return redirect('../notebooks');
	}
}

