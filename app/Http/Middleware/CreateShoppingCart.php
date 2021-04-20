<?php

namespace App\Http\Middleware;

use Closure;

class CreateShoppingCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cart = session('products');
        
        if (!isset($cart[0]['id'])) {
            session(['products' => [['id' => '', 'unit' => 0]]]);
        }
        
        return $next($request);
    }
}
