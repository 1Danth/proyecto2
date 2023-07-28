<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reunion;

class ReunionController extends Controller
{
    public function index()  {
        $reuniones=Reunion::all();
        return view('reunions.index',['reuniones' => $reuniones]);
    }
}
