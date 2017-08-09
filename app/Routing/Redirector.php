<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Routing;
use Illuminate\Routing\Redirector as RedirectorLaravel;
use App\Tenant\TenantManager;
/**
 * Description of Redirector
 *
 * @author Rafael-PC
 */


class Redirector extends RedirectorLaravel {
    public function routeTenant($name, $params = [], $status=302, $headers=[]) {
        $tenantManager = app(TenantManager::class);
        $tenantParam = $tenantManager->routeParam();
        return $this->route($name, $params + [
            config('tenant.route_param') => $tenantParam ], $status, $headers);
    }
}
