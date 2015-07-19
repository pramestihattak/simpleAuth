<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Mail;
use Input;

class SimpleauthController extends Controller
{
    
	public function register()
	{
		
		return view('registration.registration');

	}

	public function doRegister(RegistrationRequest $request)
    {
        
        $input = $request->all();
        $password = bcrypt($request->input('password'));
        $input['password'] = $password;
        $input['activation_code'] = str_random(60) . $request->input('email');
        $register = User::create($input);
        
        $data = [
            'name' => $input['name'],
            'code' => $input['activation_code']
        ];

        $this->sendEmail($data, $input);

        return redirect()->route('index');      

    }

    public function sendEmail($data, $input)
    {
        
       Mail::send('emails.register', $data, function($message) use ($input) {
      
            $message->from('team@laravel-indonesia.com', 'Laravel Indonesia');

            $message->to($input['email'], $input['name'])->subject('Please verify your account registration!');
    
        }); 

    }

    public function activate($code, User $user)
    {

        if ($user->activateAccount($code)) {
            
            return 'Activated!';

        }

        return 'Fail';
        
    }

    public function login(LoginRequest $request)
    {
        
        $credentials = $request->only('email', 'password');

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($credentials)){
            
            /*
            Jika username dan password match, lakukan logika if berikut ini.
            kalau user belum mengaktifkan accountnya, maka logout, dan tampilka message untuk mengaktifkannya
            */
            if (Auth::user()->active == 0) {
                
                Auth::logout();
                return 'Please activate your account';

            }
            else{

                return 'You have been log in';

            }

        }
        else{
            return 'The username and password do not match';
        }

    }

    public function logout()
    {
    	
    	Auth::logout();

    	return redirect()->route('index');

    }

}
