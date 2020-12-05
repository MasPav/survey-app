<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    public function submit(Request $request)
    {
        // dd($request->all());
        // Session::flash('thankYou', "Special message goes here");
        return Redirect::back()->with('thankYou', "");
    }
}
