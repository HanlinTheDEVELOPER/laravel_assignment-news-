<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getNews($tag = 'all')
    {

        return view('Table.all')->with(['data' => $tag]);
    }
    public function uploadNews(Request $request)
    {
        dd($request);
    }
}