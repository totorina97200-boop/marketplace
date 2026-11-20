<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommercantMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier que l'utilisateur est connecté
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Vérifier que l'utilisateur possède le rôle commerçant
        if ($request->user()->role !== 'commercant') {
            abort(403, 'Accès réservé aux commerçants.');
        }

        return $next($request);
    }
}
