<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\User;

class AjaxController extends Controller
{
    public function album(Request $request) {
        $album = Album::find($request->id);
        $album->number = (int) Album::get()->max('number') + 1;
    	return response()->json($album);
    }

    public function mail(Request $request) {
    	$result = User::where('email', $request->email)->first();
    	if ($result) {
    		return $result->id == $request->id ? 'true' : 'false';
    	}
    	return 'true';
    }
}
