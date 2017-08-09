<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * Description of TenantScope
 *
 * @author Rafael-PC
 */
class TenantScope implements Scope {
    //put your code here
    
    public function apply(Builder $builder, Model $model) 
    {
        $AccountId = \Auth::user()->account_id;
        $builder->where('account_id', $AccountId);
    }
    
}
