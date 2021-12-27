<?php

namespace App\Http\Controllers;

use App\Models\Feeling;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $feelings = Feeling::all();

        return view('index', compact('feelings'));
    }
}
