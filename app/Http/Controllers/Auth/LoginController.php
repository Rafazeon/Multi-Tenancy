<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Tenant\TenantManager;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    // Verifica se o usuário está logando no domínio dele
    protected function credentials(Request $request) 
    {
        $data = $request->only($this->username(), 'password');
        $tenantManager = app(TenantManager::class);
        
        // Caso a autenticação não for administrativa
        if($tenantManager->getTenant() && !$tenantManager->isSubdomainExcept()) {
            $data['account_id'] = $tenantManager->getTenant()->id;
        }
        return $data;
    }
}
