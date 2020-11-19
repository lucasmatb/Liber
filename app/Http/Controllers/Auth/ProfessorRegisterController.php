<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Professor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProfessorRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    use RedirectsUsers;
    use RegistersUsers;

    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();
    
        event(new Registered($professor = $this->create($request->all())));

        //session()->flash('success', 'Your message');
        //return $this->registered($request, $professor)
         //?: redirect($this->redirectPath());
         //return Redirect::to("/professor/login")->withSuccess('Seu registro foi enviado com sucesso e será analisado pelos administradores.');
         return redirect(route('professor.login'))->with('success', 'Seu registro foi enviado com sucesso e será analisado pelos administradores.');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'sobrenome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:professores'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Professor
     */
    protected function create(array $data){
            Professor::create([
                'name' => $data['name'],
                'sobrenome' => $data['sobrenome'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'unconfirmed' => 1]);
            }

    public function showProfessorRegisterForm()
        {
            return view('auth.professor-register');
        }

    protected function redirectPath()
        {
            if (method_exists($this, 'redirectTo')) {
                return $this->redirectTo();
            }
    
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/professor';
        }

    }
    
    