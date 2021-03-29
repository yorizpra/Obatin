<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (Auth::guard('admin')->check()) {

            return redirect('/admin/index');

          } else if (Auth::guard('mitra')->check()) {

            return redirect('/mitra/index');

          } else if (Auth::guard('konsumen')->check()) {

            return redirect('/konsumen/index');
        }
    }

  }
