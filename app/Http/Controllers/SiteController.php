<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function index()
    {
        return view('site');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'plot' => 'required',
            'year' => 'required',
        ];

        // 
        $request_input = $request->only('title', 'year', 'plot');

        // 
        $validator = Validator::make($request_input, $rules);
        
        // 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $response = Http::get('http://www.omdbapi.com/?apikey='.env('APIKEY_OMDB').'&t='.$request_input['title'].'&y='.$request_input['year'].'&plot='.$request_input['plot'].'');
    
        $jsonData = $response->json();

        // echo "<pre>";
        // print_r($jsonData);
        // echo "</pre>";

        return view('site', compact('jsonData'));
    }
}
