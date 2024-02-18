<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
 
class LandingController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): Response
    {
        return Inertia::render('Landing', [
            'name' => 'Jack Brown'
        ]);
    }
}
