<?php

namespace App\Scopes;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;

trait TenantModels {

// Adiciona o Scope Global para caso fizer alguma alteração de Query não precisa mais chamar no Controller
    
    protected static function boot() 
    {
        parent::boot();
        
        static::addGlobalScope(new TenantScope());
        
        // Evento para ao criar um novo produto, atribuir o account_id ao Model
        static::creating(function(Model $model) {
        if(\Auth::user()){
           $AccountId = \Auth::user()->account_id;
           $model->account_id = $AccountId;
        }
        });
        
    }
    
}
