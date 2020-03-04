<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
	public function index(){
		$products = Product::orderBy('id', 'desc')->paginate(8);
		$i=0;
		return view('shop.shoppingcart',compact('products','i'));
	}
}
