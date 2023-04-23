<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupSessionController extends Controller
{
    public function index()
    {
        return view('admin.sessions_management.group_sessions');
    }
}
