<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndividualSessionController extends Controller
{
    public function index()
    {
        return view('admin.sessions_management.individual_sessions');
    }
}
