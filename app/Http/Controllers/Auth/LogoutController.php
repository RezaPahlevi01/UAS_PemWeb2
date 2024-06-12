<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // Logout dari Laravel
        Auth::logout();
        
        // Logout dari Google dengan mengarahkan ke URL logout Google
        $googleLogoutUrl = 'https://accounts.google.com/Logout';

        // Redirect ke halaman login setelah logout
        return redirect($googleLogoutUrl);
    }
}
