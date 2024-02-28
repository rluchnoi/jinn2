<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): Response
    {
        return Inertia::render('Products', [
            'products' => [
                0 => 'Car',
                1 => 'House',
                2 => 'Pool'
            ]
        ]);
    }
}
