<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    //

    public function store(Question $question){
        $question->favorites()->attach(auth()->id());
        return redirect()->back();
    }
    public function destroy(Question $question){
        $question->favorites()->detach(auth()->id());
        return redirect()->back();
    }
}
