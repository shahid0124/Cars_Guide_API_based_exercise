<?php

namespace App\Http\Controllers;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.registration-form');
    }
}
