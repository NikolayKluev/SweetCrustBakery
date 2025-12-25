<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    function show_contacts() {
        return view('contacts');
    }


    function show_reviews() {
        return view('reviews');
    }


}
