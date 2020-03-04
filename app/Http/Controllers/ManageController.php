<?php

namespace App\Http\Controllers;

use App\Model\Color;
use App\Model\Status;
use Illuminate\Http\Request;

class ManageController extends Controller
{
	public function indexColor(){

		$colors = Color::orderBy('id','desc')->get();
		return view('manages.color.index',compact('colors'));
		
	}    		

	public function createColor(){

		return view('manages.color.create');
	}    		

	public function storeColor(){
		if (Color::create(request()->all())) {
			return redirect()->route('color.index');
		}
		
	}    		

	public function editColor($id){

		return view('manages.color.edit');
		
	}    	

	public function updateColor(){
		
	}    		

	public function destroyColor($id){
		if (Color::destroy($id)) {
			return back();
		}
		
	}

	public function restoreColor(){
		// $colors = Color::withTrashed()->get();
		$colors = Color::onlyTrashed()->get();
		// dump($colors);
		return view('manages.color.restore',compact('colors'));
	}

	public function postRestoreColor($id = null){
		if ($id != null) {
			Color::onlyTrashed()->where('id', $id)->restore();
		}else{
			if (isset(request()->id)) {
				Color::onlyTrashed()->whereIn('id', request()->id)->restore();
			}else{
				return back()->with('status', 'Please checkbox to restore!');
			}
		}
		return back();
		
	}

	// --------------------------Status--------------------------    		

	public function indexStatus(){
		$statuses = Status::orderBy('id','desc')->get();
			return view('manages.status.index',compact('statuses'));
		
	}    		

	public function createStatus(){

		return view('manages.status.create');
		
	}    		

	public function storeStatus(){
		if (Status::create(request()->all())) {
			return redirect()->route('status.index');
		}
	}    		

	public function editStatus($id){

		return view('manages.status.edit');
		
	}    		

	public function destroyStatus($id){
		if (Status::destroy($id)) {
			return back();
		}
		
	}
}
