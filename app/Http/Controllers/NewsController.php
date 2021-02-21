<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $news = News::all();
            $auth = auth()->user()->role_id;
            return view('dashboard.pages.news.index', compact('news', 'auth'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.news.create');
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
            'description' => 'required',
            'image' => 'required',
        ]);

        $gambar = $request->image;
        $new_gambar = time() . $gambar->getClientOriginalName();

        $post = News::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'public/uploads/posts/' . $new_gambar,
        ]);

        $gambar->move('public/uploads/posts/', $new_gambar);

        return redirect()->back()->with('success', 'News berhasil ditambahkan');
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
        $news = News::findorfail($id);

        return view('dashboard.pages.news.edit', compact('news'));
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
            'description' => 'required',
            'image' => 'required',
        ]);

        $news = News::findorfail($id);
        if ($request->has('image')) {
            $gambar = $request->image;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $new_gambar);

            $news_data = [
                'title' => $request->title,
                'description' => $request->description,
                'image' => 'public/uploads/posts/' . $new_gambar,
            ];
        } else {
            $news_data = [
                'title' => $request->title,
                'description' => $request->description,
            ];
        }

        $news->update($news_data);
        return redirect()->route('news.index')->with('success', 'Post berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findorfail($id);

        $news->delete();

        return redirect()->back()->with('success', 'News berhasil dihapus');
    }
}
