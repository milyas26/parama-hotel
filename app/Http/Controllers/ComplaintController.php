<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $complain = Complaint::all();
            $auth = auth()->user()->role_id;
            $user = auth()->user()->id;
            $complain_user = Complaint::where('user_id', $user)->get();
            return view('dashboard.pages.complaint.index', compact('auth', 'complain', 'complain_user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.complaint.create');
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
            'content_complaint' => 'required',
        ]);

        Complaint::create([
            'title' => $request->title,
            'content_complain' => $request->content_complaint,
            'user_id' => auth()->user()->id
        ]);

        return redirect('complaint')->with('success', 'Complain telah terkirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $complain = Complaint::find($id);
            $comment =  Comment::where('complain_id', $id)->get();
            $auth = auth()->user()->role_id;
            return view('dashboard.pages.complaint.show', compact('auth', 'complain', 'comment'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $comment = Comment::where('complain_id', $id);

        $complaint->delete();
        $comment->delete();

        return redirect()->back()->with('success', 'Complaint berhasil dihapus');
    }
}
