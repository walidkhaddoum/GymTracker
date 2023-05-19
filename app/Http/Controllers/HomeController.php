<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function index()
    {
        return redirect($this->redirectTo());
    }

    protected function redirectTo()
    {
        $user = Auth::user();  // Get the currently authenticated user
        $role = $user->role->name;  // Get the role of the user

        // Redirect based on the role of the user
        switch ($role) {
            case 'admin':
                return route('admin.dashboard');
            case 'trainer':
                return route('trainer.dashboard');
            default:
                return route('user.gyms.index');
        }
    }

}
