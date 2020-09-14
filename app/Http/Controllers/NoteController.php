<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Note;

class NoteController extends Controller
{
    function create()
    {
        return view('notes.create');
    }

    function store(Request $request)
    {
        //validation
        $request->validate
        (
            [
                'content'=>'required|string',
                
            ]
        );
        Note::create
        ([
            'content'=>$request->content,
            'user_id'=>Auth::user()->id
        ]);
        
        return redirect(route('allbooks'));
    }
}
