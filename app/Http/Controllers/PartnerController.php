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
        return Inertia::render('Partner', [
            'phone' => '+1 457 475 12 78',
            'email' => 'jinn2.apply.email@gmail.com'
        ]);
    }
}
