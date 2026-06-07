<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MahasiswaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session('role') != 'mahasiswa') {
            return redirect('/login');
        }

        return $next($request);
    }
}