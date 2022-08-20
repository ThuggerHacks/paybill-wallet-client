<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserAuth extends Controller
{
    public function login () {

        return view('login');
    }

    public function makeLogin(Request $request){

        try{

            //sending data to backend
            $resp = Http::withHeaders([
                'Accept' => 'application/json'
            ])->post(config("constants.paybill_api")."/user/auth/sign-in",[
                "login" => $request->login,
                "password" => $request->password
            ]);

            //if success, store token
            if(isset($resp['token'])){
                $request->session()->put("user_token",$resp['token']);
                return redirect()->route("home");
            }else{
                //if error, send error to view
                return redirect()->back()->with("error", $resp['error']);
            }
        }catch(Exception $ex){
            return redirect()->back()->with("error","Houve algum erro, por favor volte a tentar");
        }
    }


    public function register () {

        return view('register');
    }

    public function registerMake(Request $request){

        if(!isset($request->checkbox) || !$request->checkbox){
            $request->session()->flash("error", "Por favor concorde com os nossos termos");
            return redirect()->back()->withInput();
        }
        try{
                //sending data to backend
            $resp = Http::withHeaders([
                'Accept' => 'application/json'
            ])->post(config("constants.paybill_api").'/user/auth/sign-up',[
                "user_name" => $request->user_name,
                "user_email" => $request->user_email,
                "user_password" =>$request->user_password,
                "user_confirm_password" =>$request->user_confirm_password,
                "user_phone_number" =>$request->user_phone_number,
                "user_birthdate" =>$request->user_birthdate,
                "user_birthplace" =>$request->user_birthplace
            ]);

            //if success 
            if(isset($resp['success'])){
                return redirect()->back()->with("success", "Registado com sucesso");
            }else{
                //if any error of data
                if(isset($resp['error'])){
                    $request->session()->flash("error",$resp['error']);
                    return redirect()->back()->withInput();
                }else if(isset($resp['errors'])){
                    //declarar array para armazenar erros
                    $errors = [];

                    //armazenar erros no array para conseguir pegar atraves de posicoes numericas e nao chaves 'string'
                    foreach( $resp['errors'] as $error){
                        $errors = $error;
                    }
                    $request->session()->flash("error",$errors[count($errors)-1]);
                    return redirect()->back()->withInput();

                }
            }
        }catch(Exception $ex){
            return redirect()->back()->withInput()->with("error","Houve algum erro, por favor volte a tentar");
        }
    }

    public function logout(Request $request) {

        if($request->session()->has('user_token')){

            try{

                //ending section in the backend (deleting token and tuff)
                $logout = Http::withHeaders([
                    'Accept' => 'application/json',
                    'access_token' => $request->session()->get('user_token')
                ])->post(config("constants.paybill_api").'/logout');

                //ending section in the frontend
                $request->session()->forget("user_token");
                
                //redirecting back to login
                return redirect()->route("login");

            }catch(Exception $ex){
                return redirect()->route("home");
            }

        }
    }

    public function forgot () {
 
        return view('forgot');
    }
}
