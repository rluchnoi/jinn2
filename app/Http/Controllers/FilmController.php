<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Response as HttpResponse;
use Inertia\Inertia;
use Inertia\Response;

class FilmController extends Controller
{
    /**
     * Show all films
     */
    public function index(): Response
    {
        return Inertia::render('Films', [
            'films' => Film::with('actors', 'director')->get()
        ]);
    }
}
