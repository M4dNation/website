<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AjaxOnly
{
	/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
	public function handle($request, Closure $next, $guard = null)
	{
		if (!$request->ajax())
		{
			abort('404');
		}

		return $next($request);
	}
}