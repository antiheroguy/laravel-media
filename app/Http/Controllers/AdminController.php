<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Item;
use App\Models\User;
use DB;

class AdminController extends Controller
{
    public function index() {
    	$album = Album::all()->count();
    	$item = Item::all()->count();
    	$user = User::all()->count();
    	return view('admin.page.home', compact('album', 'user', 'item'));
    }
}
