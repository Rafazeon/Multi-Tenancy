<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantModels;

class Product extends Model
{   
    // Aplica o Query Builder na Model
    use TenantModels;
    
    protected $fillable = [
    	'name', 'number', 'active', 'category', 'description'
    ];
    
}
