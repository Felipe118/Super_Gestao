<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
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
     
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);
        $rota = $request->getRequestUri();
        $ip = $request->server->get("REMOTE_ADDR");
        return Response('Chegamos ao Middleware');
    }
}
