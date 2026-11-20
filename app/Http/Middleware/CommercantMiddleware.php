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

        // Autoriser les administrateurs et les commerçants
        if (!in_array($request->user()->role, ['admin', 'commercant'])) {
            abort(403, 'Accès réservé aux administrateurs et aux commerçants.');
        }

        return $next($request);
    }
}
