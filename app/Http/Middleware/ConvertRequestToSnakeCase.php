<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\KeyCaseConverter;

class ConvertRequestToSnakeCase
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->replace(
            resolve(KeyCaseConverter::class)->convert(
                KeyCaseConverter::CASE_SNAKE,
                $request->all()
            )
        );

        return $next($request);
    }
}
