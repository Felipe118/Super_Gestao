<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao,$perfil)
    {
        //eturn $next($request);
       echo $metodo_autenticacao.' _ ' .$perfil.'<br>';
        if($metodo_autenticacao == 'padrao'){
            echo 'Verificando o usuário e senha no banco de dados <br>';
        }
        if(false){
            return $next($request);
        }else{
                return Response('Acesso negado! Rota exige autenticação!');
        }
            

        
    }
}
