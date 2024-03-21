<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Film;
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
            'films' => Film::all()
        ]);
    }

    /**
     * Show a film
     */
    public function show(int $id): Response
    {
        $film = Film::with('actors', 'director')->find($id);

        return Inertia::render('Film', [
            'film' => $film
        ]);
    }
}
