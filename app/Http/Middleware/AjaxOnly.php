<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AjaxOnly
{
	public function handle($request, Closure $next, $guard = null)
	{
		if (!$request->ajax())
		{
			abort('404');
		}

		return $next($request);
	}
}