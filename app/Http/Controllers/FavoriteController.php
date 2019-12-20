<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
class FavoriteController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function store(Question $question){
        $question->favorites()->attach(auth()->id());
        if(request()->expectsJson()){
           return response()->json(null ,204);
        }
        return back();
    }
    public function destroy(Question $question){
        $question->favorites()->detach(auth()->id());
        if(request()->expectsJson()){
            return response()->json(null ,204);
        }
        return back();
    }
}
