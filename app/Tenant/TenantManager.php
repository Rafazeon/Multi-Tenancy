<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tenant;

/**
 * Description of TenantManager
 *
 * @author Rafael-PC
 */
class TenantManager {
    private $tenant; // Instancia de Account
    
    //Função para localizar a rota do Tenant
    public function routeParam() {
        return \Request::route(config('tenant.route_param'));
    }
    
    
    // Função para verificar se é um sub domínio
    public function isSubdomainExcept() {
        $tenantParam = $this->routeParam();
        return $tenantParam && in_array($tenantParam, config('tenant.subdomains_except')) ? true : false;
    }
    
    // Função para caso existir o Tenant ele trás o primeiro valor que retornar
    public function getTenant() {
        if(!$this->tenant){
            $model = config('tenant.model');
            $this->tenant = $model
                    ::where(config('tenant.field_name'),$this->routeParam())
                    ->first();        
        }
        return $this->tenant;
    } 
    
    
}
