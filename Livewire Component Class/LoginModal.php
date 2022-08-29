<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginModal extends Component
{

    public string $username = '';
    public string $password = '';
    public string $currentPath = '';
    
    public function render()
    {
        return view('livewire.login-modal');
    }

    public function mount(){
        $this->currentPath = request()->path();
    }

    protected $rules = [
        'username' => 'required|email|string',
        'password' => 'required|string'
    ];

    public function login(Request $request)
    {
  
        $this->validate();

        if ($this->attemptLogin()) {
            //Login Success
            $request->session()->regenerate();
            return redirect()->intended($this->currentPath);
        }

    
        //Login Failure
        session()->flash('error', 'These credentials do not match our records.');
        return;

    }


    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin()
    {
        return $this->guard()->attempt(
            ['email' => $this->username, 'password' => $this->password]
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

}
