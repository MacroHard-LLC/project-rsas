<?php

namespace App\Http\Middleware;

use App\Http\Kernel;
use App\Models\Subject_table;
use Closure;
use ReflectionMethod;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubjectIdValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $subj_id = $request->input('subj_id');

        // check if the SUBJECT already exists in the database
        $id = Subject_table::where('id', $subj_id)->first();
        if ($id) {
            // if the SUBJECT IT exists, return a response indicating a duplicate value
            return response("<script>alert('This SUBJECT ID is already in use.');window.history.back();</script>");
        }
        // if the SUBJECT ID is not a duplicate, allow the request to proceed
        return $next($request);
    }
}
