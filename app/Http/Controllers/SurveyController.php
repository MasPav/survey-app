<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SurveyController extends Controller
{
    public function submit(Request $request)
    {
        try {
            DB::table('responses')->insert([
                'answers' => json_encode($request->except('_token')),
                'added_on' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
            // $responses = Storage::disk('local')->exists('responses.json') ? json_decode(Storage::disk('local')->get('responses.json')) : [];
            // array_push($responses, array_merge($request->except('_token'), ['submitted_on' => date('Y-m-d H:i:s')]));
            // Storage::disk('local')->put('responses.json', json_encode($responses));
            return Redirect::back()->with('thankYou', "");
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return Redirect::back()->with('error', "");
        }
    }
}
