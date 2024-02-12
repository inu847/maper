<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $materi = Materi::orderBy('id', 'desc')->get();

        return view('front.landingpage', compact('materi'));
    }

    public function show($id)
    {
        $materi = Materi::find($id);

        return view('front.materi', compact('materi'));
    }
}
