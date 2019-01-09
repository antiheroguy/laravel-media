<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Item;

class HomeController extends Controller
{
    public function __construct() {
    }

    public function index(Request $request) {
        $album = Album::orderBy('title', 'asc');
        $item = Item::where('album_id', 0)->orderBy('title', 'asc');
        if($request->s) {
            $album = $album->where('title', 'like', '%' . $request->s . '%');
            $item = $item->where('title', 'like', '%' . $request->s . '%');
        }
        $album = $album->paginate(12);
        $item = $item->get();
    	return view('home.list.index', compact('album', 'item'));
    }

    public function album(Request $request, $id = null) {
        if($id) {
            $album = Album::find($id);
            if(!$album || !count($album->item)) {
                return redirect('/');
            }
            $album->increment('view');
            $title = $album->title;
            $related = Album::where('id', '!=', $album->id)->orderBy('title', 'asc')->take(10)->get();
            return view('home.detail.album', compact('album', 'related', 'title'));
        }

        $title = 'Phim bộ';
        $list = Album::orderBy('title', 'asc')->paginate(12);
        return view('home.list.album', compact('list', 'title'));
    }

    public function item(Request $request, $id = null) {
        if($id) {
            $item = Item::find($id);
            if(!$item) {
                return redirect('/');
            }
            $item->increment('view');
            $title = $item->title;
            $related = Item::where('album_id', $item->album_id)->where('id', '!=', $item->id);
            if($item->number) {
                $related = $related->where('number', '>', $item->number);
            }
            $related = $related->orderBy('title', 'asc')->take(10)->get();
            return view('home.detail.item', compact('item', 'related', 'title'));
        }

        $title = 'Phim lẻ';
        $list = Item::where('album_id', 0)->orderBy('title', 'asc')->paginate(12);
        return view('home.list.item', compact('list', 'title'));
    }

    public function detail(Request $request) {
        $item = Item::find($request->id);
        if($item) {
            return response()->json($item, 200);
        }
        return response()->json(['error' => 'Nothing more'], 200);
    }
}
