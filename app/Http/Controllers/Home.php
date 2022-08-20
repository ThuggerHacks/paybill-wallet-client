<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Home extends Controller
{
    public  function index(Request $request) {

        try{

            $my_wallets = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/wallet/user');

            return view('home',["wallets" => $my_wallets['data']]);

        }catch( Exception $ex){
            return redirect()->back();
        }
    }

    public function config() {
        return view('user');
    }

    public function deposits() {
        return view('deposits');
    }

    public function withdraws() {
        return view('withdraw');
    }

    public function payments() {
        return view('payment');
    }

    public function sends() {
        return view('send');
    }

    public function received() {
        return view('received');
    }

    public function transation($id=0) {
        return view('transation');
    }

    public function createWallet(Request $request){
        
        //getting form data
        $wallet_title = $request->wallet_title;
        $wallet_associated_phone_number = $request->wallet_associated_phone_number;

        try{
            //sending to server
            $new_wallet = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get("user_token")
            ])->post(config("constants.paybill_api").'/wallet/create',[
                    "wallet_title" => $wallet_title,
                    "wallet_associated_phone_number" => $wallet_associated_phone_number
            ]);
            
                
                            
            //checking for errors
           if( isset($new_wallet['errors'])) {
               //errors collector
                $errors = [];

                //collect all errors and convert its position tonumerical, since its coming in array key value

                foreach($new_wallet['errors'] as $error){
                    $errors = $error;
                }

                //redirect with input validation errors
                return redirect()->route("home")->with("error", $errors[0]);

           }else if ( isset($new_wallet['error'])){
                //redirect with database errors ( exists, maximum,etc)
                return redirect()->route("home")->with("error", $new_wallet['error']);
           }else if(isset($new_wallet['success'])){
            return redirect()->route("home")->with("success", $new_wallet['success']);
           }

        }catch( Exception $ex){
            return redirect()->route("home")->with("error", "Houve um erro, volte a tentar mais tarde");
        }
    }

    public function createTransfer(Request $request){

        try{

            //sending data to backend
            $transfer = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->post(config("constants.paybill_api").'/transfer',[
                "amount" => $request->amount,
                "from" => base64_decode($request->from),
                "to" => $request->to
            ]);


            //checking for errors
            if(isset($transfer['errors'])){

                $errors = [];

                foreach($transfer['errors'] as $error){
                    $errors = $error;
                }

                return redirect()->route('home')->with('error', $errors[0]);
            }else if(isset($transfer['error'])){
                return redirect()->route('home')->with('error', $transfer['error']);
            }else if(isset($transfer['success'])){
                return redirect()->route('home')->with('success', $transfer['success']);
            }

        }catch( Exception $ex){

            return redirect()->back();
        }
    }

    public function activateWallet(Request $request){

        try{
            //activate a wallet to show its data

            $activate_wallet = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->post(config('constants.paybill_api').'/wallet/activate/'.base64_decode($request->wallet));

            return redirect()->back();
        }catch(Exception $ex){

            return redirect()->back();
        }
    }
}
