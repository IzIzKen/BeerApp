<?php

namespace App\Http\Controllers;

use App\Models\Feelings;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $feelings = Feelings::all();

        return view('index', compact('feelings'));
    }
}
