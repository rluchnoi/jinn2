<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilmUploadRequest;
use App\Http\Services\FilmFileUploadService;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
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
            'films' => Film::with('actors', 'director')
                ->where('video', '!=', null)
                ->get()
        ]);
    }

    /**
     * Upload film view
     */
    public function uploadView(): Response
    {
        return Inertia::render('UploadFilm', [
            'actors'    => Actor::query()
                                    ->get(['id', 'name'])
                                    ->map( fn ($tag) => ['value' => $tag->id, 'name' => $tag->name])
                                    ->toArray(),

            'directors' => Director::query()
                                    ->get(['id', 'name'])
                                    ->map( fn ($tag) => ['value' => $tag->id, 'name' => $tag->name])
                                    ->toArray(),
        ]);
    }

    /**
     * Upload film
     */
    public function upload(
        FilmUploadRequest $request,
        FilmFileUploadService $fileUploadService
    ): RedirectResponse
    {
        $data = $request->validated();

        $film = new Film();
        $film->name = $data['name'];
        $film->year = $data['year'];
        $film->director_id = $data['director'];

        $fileUploadService->uploadImage($request->file('image'), $film);

        $film->save();
        $film->actors()->attach($data['actors']);

        // TEST!!!!!!
        $fileUploadService->uploadVideo($request->file('video'), $film);

        return Redirect::route('film.upload');
    }
}
