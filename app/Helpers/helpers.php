<?php

use App\Tenant\TenantManager;

// Recupera qual o valor do sub domínio na rota

if(!function_exists('routeTenant')) {
    function routeTenant($name, $params = [], $absolute = true) {
        $tenantManager = app(TenantManager::class);
        $tenantParam = $tenantManager->routeParam();
        return route($name, $params + [
            config('tenant.route_param') => $tenantParam ], $absolute);
    }
}


// Verifica se vai redirecionar o usuário para a área tenant ou a área administrativa


if(!function_exists('layoutTenant')) {
    function layoutTenant() {
        $tenantManager = app(TenantManager::class);
        $isSubdomainExcept = $tenantManager->isSubDomainExcept();
        return !$isSubdomainExcept ? 'layouts.app' : 'layouts.admin';
    }
}

