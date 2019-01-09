<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Helpers\File;

class AlbumController extends Controller
{
    public function __construct() {
        view()->share(['module' => 'album']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $album = Album::orderBy('id', 'desc');
        if ($request->search) {
            $album = $album->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('artist', 'like', '%' . $request->search . '%');
            });
        }
        $album = $album->paginate(20);
        $title = 'Album Management';
        return view('admin.album.index', compact('album', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Album';
        return view('admin.album.form', compact('title'));
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
            $poster = File::upload($request->file('poster_file'));
            if($poster){
                $request->merge(['poster' => $poster]);
            }
        }
        $request->merge(['view' => 0]);
        Album::create($request->except('poster_file'));
        $request->session()->flash('status', 'Album has been created');
        return redirect('admin/album');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $title = 'Edit Album';
        return view('admin.album.form', compact('album', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        if ($request->hasFile('poster_file')) {
            $poster = File::upload($request->file('poster_file'));
            if($poster){
                $request->merge(['poster' => $poster]);
            }
        }
        $album->update($request->except('poster_file'));
        $request->session()->flash('status', 'Album has been updated');
        return redirect('admin/album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Album $album)
    {
        $request->session()->flash('status', 'Album has been deleted');
        $album->item()->delete();
        $album->delete();
    }
}
