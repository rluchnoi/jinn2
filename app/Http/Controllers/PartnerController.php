<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class PartnerController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): Response
    {
        return Inertia::render('Partner');
    }
}
