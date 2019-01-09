<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Helpers\File;

class ItemController extends Controller
{
    public function __construct() {
        view()->share([
            'module' => 'item',
            'album' => Album::orderBy('title', 'asc')->get()->pluck('title', 'id')
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->album != '') {
            $item = Item::where('album_id', $request->album)->orderBy('number', 'desc');
        } else {
            $item = Item::orderBy('id', 'desc');
        }
        if ($request->search) {
            $item = $item->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('artist', 'like', '%' . $request->search . '%');
            });
        }
        $item = $item->paginate(20);
        $title = 'Item Management';
        return view('admin.item.index', compact('item', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Item';
        return view('admin.item.form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('poster_file')) {
            $poster = File::upload($request->file('poster_file'),'media');
            if($poster){
                $request->merge(['poster' => $poster]);
            }
        }
        if(!$request->album_id) {
            $request->merge(['album_id' => 0]);
        }
        $request->merge(['view' => 0]);
        Item::create($request->except('poster_file'));
        $request->session()->flash('status', 'Item has been created');
        return redirect('admin/item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $title = 'Edit Item';
        return view('admin.item.form', compact('item', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        if ($request->hasFile('poster_file')) {
            $poster = File::upload($request->file('poster_file'),'media');
            if($poster){
                $request->merge(['poster' => $poster]);
            }
        }
        if(!$request->album_id) {
            $request->merge(['album_id' => 0]);
        }
        $item->update($request->except('poster_file'));
        $request->session()->flash('status', 'Item has been updated');
        return redirect('admin/item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Item $item)
    {
        $request->session()->flash('status', 'Item has been deleted');
        $item->delete();
    }
}
