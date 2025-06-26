<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Pastikan user adalah user biasa (userType = 'user')
        if (Auth::user()->userType !== 'user') {
            // Jika admin, redirect ke dashboard admin
            if (Auth::user()->userType === 'admin') {
                return redirect()->route('admin.dashboard')->with('error', 'Akses ditolak. Anda adalah admin, silakan gunakan dashboard admin.');
            }

            // Jika role tidak dikenali
            return redirect()->route('login')->with('error', 'Role tidak dikenali. Hubungi administrator.');
        }

        return $next($request);
    }
}