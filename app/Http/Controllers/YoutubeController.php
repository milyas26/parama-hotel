<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Youtube;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youtube = Youtube::all();
        return view('dashboard.pages.youtube.index', compact('youtube'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.youtube.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url_thumbnail' => 'required',
            'url_video' => 'required',
        ]);

         $youtube = Youtube::create([
            'title' => $request->title,
            'url_thumbnail' => $request->url_thumbnail,
            'url' => $request->url_video,
        ]);

        return redirect()->back()->with('success', 'Youtube berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $youtube = Youtube::findorfail($id);

        return view('dashboard.pages.youtube.edit', compact('youtube'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'title' => 'required',
            'url_thumbnail' => 'required',
            'url_video' => 'required',
        ]);

        $news = Youtube::findorfail($id);

        $data = [
            'title' => $request->title,
            'url_thumbnail' => $request->url_thumbnail,
            'url' => $request->url_video,
        ];

        $news->update($data);
        return redirect()->route('youtube.index')->with('success', 'Post berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $youtube = Youtube::findorfail($id);

        $youtube->delete();

        return redirect()->back()->with('success', 'Youtube berhasil dihapus');
    }
}
