<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Crypt;

class Home extends Controller
{

    private function payTax($token,$payer_wallet,$transation_amount,$tax_amount,$title){
        
        $payAccount = Http::withHeaders([
            'Accept' => 'application/json',
            'access_token' => $token,
            "secret_key" => config("constants.secret_key")
        ])->post(config("constants.paybill_api").'/paybill/payment/wallet/'.config("constants.tax_wallet_id"),[
            "payment_amount" => (floatval($transation_amount)*floatval($tax_amount)/100),
            "payer_wallet_id" => $payer_wallet,
            "secret_key" => config("constants.secret_key"),
            "title" => $title
        ]);


          //dealing with errors
        if(isset($payAccount['message'])){
            return redirect()->route("home")->with("error", $payAccount['message']);
        }

        if(isset($payAccount['error'])){
            return redirect()->route("home")->with("error", $payAccount['error']);
        }

        if(isset($payAccount['errors'])){
            return redirect()->route("home")->with("error", $payAccount['errors']);
        }

        return floatval($transation_amount*config("constants.tax_amount")/100);
    }
    
    public  function index(Request $request) {
        
        try{

            $my_wallets = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/wallet/user');

            //getting activated wallet
                $active_wallet = 0;
                foreach($my_wallets['data'] as $active){
                    if($active['wallet_activated_status']){
                        $active_wallet = $active;
                        break;
                    }
                }


            $payments = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/payments/wallet/'.urlencode($active_wallet['wallet_id']).'/?page=1');

            $cards = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api")."/cards");


            return view('home',["wallets" => $my_wallets['data'],"data" => $payments, "wallet_id" => $active_wallet['wallet_id'],"cards" => $cards['data']]);

        }catch( Exception $ex){
            return redirect()->back();
        }
    }

    public function config(Request $request) {

        try{
            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/user/profile');
    
            return view('user',['data' => $user, "secret_key" => Crypt::encrypt(base64_encode($user['user_id']))]);
        }catch(Exception $ex){
            return redirect()->back();
        }
    }

    public function deposits(Request $request,  $wallet_id = 0, $page = 1) {

        if($wallet_id == 0 ){
            return redirect()->back();
        }

        try{

            $deposits = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/deposit/wallet/'.urlencode(base64_decode($wallet_id)).'/?page='.$page);
            
            
            //dealing with errors
            if(isset($deposits['message'])){
                return redirect()->route("home");
            }

            if(isset($deposits['error'])){
                return redirect()->route("home");
            }

            // if(count($deposits['deposits']['data']) == 0 ) {
            //     return redirect()->route("home");
            // }


            return view('deposits',["data" => $deposits]);
        }catch(Exception $ex){
            return redirect()->back();
        }
    }

    public function withdraws(Request $request,  $wallet_id = 0, $page = 1) {
        if($wallet_id == 0 ){
            return redirect()->back();
        }

        try{

            $withdraw = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/withdraw/wallet/'.urlencode(base64_decode($wallet_id)).'/?page='.$page);
            
             //dealing with errors
            if(isset($withdraw['message'])){
                return redirect()->route("home");
            }

            if(isset($withdraw['error'])){
                return redirect()->route("home");
            }

            // if(count($withdraw['withdraws']['data']) == 0 ) {
            //     return redirect()->route("home");
            // }


            return view('withdraw',["data" => $withdraw]);
        }catch(Exception $ex){
            return redirect()->back();
        }

    }

    public function payments(Request $request, $wallet_id = 0, $page = 1) {

        if($wallet_id == 0 ){
            return redirect()->back();
        }

        try{

            $payments = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/payments/wallet/'.urlencode(base64_decode($wallet_id)).'/?page='.$page);
            
             //dealing with errors
            if(isset($payments['message'])){
                return redirect()->route("home");
            }

            if(isset($payments['error'])){
                return redirect()->route("home");
            }

            // if(count($payments['payments']['data']) == 0 ) {
            //     return redirect()->route("home");
            // }

            return view('payment',["data" => $payments,"wallet_id" => base64_decode($wallet_id)]);
        }catch(Exception $ex){
            return redirect()->back();
        }
    }

    public function sends(Request $request,  $wallet_id = 0, $page = 1) {

        if($wallet_id == 0 ){
            return redirect()->back();
        }

        try{

            $transfers = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/transfer/wallet/'.urlencode(base64_decode($wallet_id)).'/?page='.$page);
            
              //dealing with errors
            if(isset($transfers['message'])){
                return redirect()->route("home");
            }

            if(isset($transfers['error'])){
                return redirect()->route("home");
            }

            // if(count($transfers['transfers']['data']) == 0 ) {
            //     return redirect()->route("home");
            // }

            return view('send',["data" => $transfers]);
        }catch(Exception $ex){
            return redirect()->back();
        }

    }

    public function received(Request $request,  $wallet_id = 0, $page = 1) {

        if($wallet_id == 0 ){
            return redirect()->back();
        }

        try{

            $transfers = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/transfer/wallet/'.urlencode(base64_decode($wallet_id)).'/?page='.$page);
            
              //dealing with errors
            if(isset($transfers['message'])){
                return redirect()->route("home");
            }

            if(isset($transfers['error'])){
                return redirect()->route("home");
            }

            // if(count($transfers['transfers']['data']) == 0 ) {
            //     return redirect()->route("home");
            // }

            return view('received',["data" => $transfers]);
        }catch(Exception $ex){
            return redirect()->back();
        }

    }

    public function transation(Request $request,$type = "deposit", $id = 0) {

        if($type == "" || $id == 0){

            return redirect()->route("home");
        }

        if($type !="deposit" && $type!="withdraw" && $type!="transfer" && $type!="received" && $type!="payment"){
            return redirect()->route("home");
        }
        
        $old_type = "";
        if($type == "received"){
            $old_type = $type;
            $type = "transfer";
        }

        try{

            $transations = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/'.$type.'/'.urlencode(base64_decode($id)));
            
             //dealing with errors
             if(isset($transations['message'])){
                return redirect()->route("home");
            }

            if(isset($transations['error'])){
                return redirect()->route("home");
            }

            if($old_type == "received"){
                $type = $old_type;
            }

            return view('transation',["data" => $transations,"type" => $type]);
        }catch(Exception $ex){
            return redirect()->back();
        }

        return view('transation');
    }

    public function taxes(Request $request, $wallet_id = 0, $page = 1) {

        if($wallet_id == 0 ){
            return redirect()->back();
        }

        try{

            $payments = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/payments/wallet/'.urlencode(base64_decode($wallet_id)).'/?page='.$page);
            
             //dealing with errors
            if(isset($payments['message'])){
                return redirect()->route("home");
            }

            if(isset($payments['error'])){
                return redirect()->route("home");
            }

            // if(count($payments['payments']['data']) == 0 ) {
            //     return redirect()->route("home");
            // }

            return view('taxes',["data" => $payments,"wallet_id" => base64_decode($wallet_id)]);
        }catch(Exception $ex){
            return redirect()->back();
        }
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

    public function updateWallet(Request $request, $id){

        try{
            $phone = $request->wallet_associated_phone_number;
            $title = $request->wallet_title;
            $phone_updated = false;
            
            if($phone){
                //update phone number
                
                $phone_update = Http::withHeaders([
                    'Accept' => 'application/json',
                    'access_token' => $request->session()->get('user_token')
                ])->put(config("constants.paybill_api").'/wallet/update/phone/'.$id,[
                    'wallet_associated_phone_number' => $phone
                ]);


                //checking for errors
                if( isset($phone_update['errors']) && !$title) {
                    //errors collector
                    $errors = [];

                    //collect all errors and convert its position tonumerical, since its coming in array key value

                    foreach($phone_update['errors'] as $error){
                        $errors = $error;
                    }

                    //redirect with input validation errors
                    return redirect()->route("home")->with("error", $errors[0]);

                }else if ( isset($phone_update['error']) && !$title ){
                    //redirect with database errors ( exists, maximum,etc)
                    return redirect()->route("home")->with("error", $phone_update['error']);
                }else if(isset($phone_update['success']) && !$title){
                    $phone_updated = true;
                    return redirect()->route("home")->with("success", $phone_update['success']);
                }
            }
            
            
            if($title){
                    //update title

                $title_update = Http::withHeaders([
                    'Accept' => 'application/json',
                    'access_token' => $request->session()->get('user_token')
                ])->put(config("constants.paybill_api")."/wallet/update/title/".$id,[
                    'wallet_title' => $title
                ]);


                //checking for errors
                if( isset($title_update['errors']) && $phone_updated == false) {
                //errors collector
                    $errors = [];

                    //collect all errors and convert its position tonumerical, since its coming in array key value

                    foreach($title_update['errors'] as $error){
                        $errors = $error;
                    }

                    //redirect with input validation errors
                    return redirect()->route("home")->with("error", $errors[0]);

                }else if ( isset($title_update['error']) && $phone_updated == false){
                    //redirect with database errors ( exists, maximum,etc)
                    return redirect()->route("home")->with("error", $title_update['error']);
                }else if(isset($title_update['success']) && $phone_updated == false){
                    return redirect()->route("home")->with("success", $title_update['success']);
                }else{
                    return redirect()->route("home")->with("error", "Houve um erro, volte a tentar mais tarde");
                }
            }
            
            if(!$title && !$phone){
                return redirect()->route("home")->with("error", "Por favor preencha pelomenos um campo");
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
                  //applying tax to the transaction
                $tax = $this->payTax($request->session()->get('user_token'),base64_decode($request->from),$request->amount,config("constants.tax_amount_transfer"),"Taxa de transferencia");
                return redirect()->route('home')->with('success', $transfer['success']);
            }

        }catch( Exception $ex){

            return redirect()->back();
        }
    }

    public function createDeposit(Request $request){

        try{
            $deposit = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->post(config("constants.paybill_api").'/deposit/make',[
                "amount" => $request->amount,
                "from" => '258'.$request->from,
                "to" => base64_decode($request->to)
            ]);

             //checking for errors
             if(isset($deposit['errors'])){

                $errors = [];

                foreach($deposit['errors'] as $error){
                    $errors = $error;
                }

                return redirect()->route('home')->with('error', $errors[0]);
            }else if(isset($deposit['error'])){
                return redirect()->route('home')->with('error', $deposit['error']);
            }else if(isset($deposit['success'])){
                return redirect()->route('home')->with('success', $deposit['success']);
            }
        }catch(Exception $ex){
            return redirect()->back()->with('error','Houve um erro');
        }
    }

    public function createWithdraw(Request $request){

        try{
            $withdraw = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->post(config("constants.paybill_api").'/withdraw',[
                "amount" => $request->amount,
                "from" => base64_decode($request->from)
            ]);

             //checking for errors
             if(isset($withdraw['errors'])){

                $errors = [];

                foreach($withdraw['errors'] as $error){
                    $errors = $error;
                }

                return redirect()->route('home')->with('error', $errors[0]);
            }else if(isset($withdraw['error'])){
                return redirect()->route('home')->with('error', $withdraw['error']);
            }else if(isset($withdraw['success'])){
                $tax = $this->payTax($request->session()->get('user_token'),base64_decode($request->from),$request->amount,config("constants.tax_amount_withdraw"),"Taxa de levantamento");
                return redirect()->route('home')->with('success', $withdraw['success']);
            }
        }catch(Exception $ex){
            return redirect()->back()->with('error','Houve um erro');
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

    public function buyCard(Request $request){

        try{

             ////pay after upgrade

            //getting card price
            $card = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->get(config("constants.paybill_api").'/cards/'.$request->card_id);

            //check errors
            if(isset($card['message'])){
                return redirect()->route("home")->with("error", $card['message']);
            }

            if(isset($card['error'])){
                return redirect()->route("home")->with("error", $card['error']);
            }

            if(isset($card['errors'])){
                return redirect()->route("home")->with("error", $card['errors']);
            }

            $payAccount = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->post(config("constants.paybill_api").'/paybill/payment/wallet/'.config("constants.wallet_id"),[
                "payment_amount" => $card['data']['pricing_amount'],
                "payer_wallet_id" => base64_decode($request->wallet_id),
                "card_id" => $request->card_id,
                "secret_key" => config("constants.secret_key")
            ]);


              //dealing with errors
            if(isset($payAccount['message'])){
                return redirect()->route("home")->with("error", $payAccount['message']);
            }

            if(isset($payAccount['error'])){
                return redirect()->route("home")->with("error", $payAccount['error']);
            }

            if(isset($payAccount['errors'])){
                return redirect()->route("home")->with("error", $payAccount['errors']);
            }



            $pro_account = Http::withHeaders([
                'Accept' => 'application/json',
                'access_token' => $request->session()->get('user_token')
            ])->put(config("constants.paybill_api").'/cards/update/pro',[
                "wallet_id" => base64_decode($request->wallet_id),
                "card_id" => $request->card_id
            ]);
            
          

              //dealing with errors
            if(isset($pro_account['message'])){
                return redirect()->route("home")->with("error", $pro_account['message']);
            }

            if(isset($pro_account['error'])){
                return redirect()->route("home")->with("error", $pro_account['error']);
            }

            if(isset($pro_account['errors'])){
                return redirect()->route("home")->with("error", $pro_account['errors']);
            }

            // if(count($transfers['transfers']['data']) == 0 ) {
            //     return redirect()->route("home");
            // }

           if(isset($pro_account['success'])){
                $tax = $this->payTax($request->session()->get('user_token'),base64_decode($request->wallet_id), $card['data']['pricing_amount'],0,"Compra de Cartao");
                return redirect()->route("home")->with("success",$pro_account['success']);
           }
        }catch(Exception $ex){
            return redirect()->back();
        }

    }


}
