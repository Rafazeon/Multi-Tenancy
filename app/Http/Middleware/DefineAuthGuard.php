<?php

namespace App\Http\Middleware;

use Closure;
use App\Tenant\TenantManager;
class DefineAuthGuard
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
        $tenantManager = app(TenantManager::class);
        // Compara se o account bate com o domínio que foi passado se não retorna o erro 404
        if(!$tenantManager->getTenant() && !$tenantManager->isSubdomainExcept()):
            abort(404);
        endif;
        
        
        // Se não existir o TenantManager ele redireciona o usuário para o outro driver
        if(!$tenantManager->isSubdomainExcept()){
            config([
               'auth.defaults.guard' => 'web_tenants',
               'auth.defaults.password' => 'user_accounts'
            ]);
        }
        
        //dd(\Auth::guard());
        
        return $next($request);
    }
}
