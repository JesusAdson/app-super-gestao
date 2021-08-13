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
        //o middleware intercepta a requisição/resposta q o browser faz e faz um tratamento.
        //por exemplo, pode verficar se tal rota está ou não disponível (em manutenção) ou se está ou não disponível para o usuário
        //'empurra a requisição para frente(rota, controller)'
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log'=> "IP: $ip solicitou acesso a rota $rota"]);
        return $next($request);        
    }
}
