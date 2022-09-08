<!-- App Capsule -->


<div id="appCapsule">

    <!-- Transactions -->
    <div class="section mt-2">
        
       <div class="section-title">Pagamentos</div>
       <div class="transactions">
          @foreach ($data['payments']['data'] as $payments)
          
          @if($payments['wallet_id'] != config("constants.tax_wallet_id"))
                <!-- item -->
                <a href="{{ route("transation.details",["type" => "payment", "id" => urlencode(base64_encode($payments['payment_reference']))]) }}" class="item">
                    <div class="detail">
                        <img src="{{ asset("assets/img/sample/brand/1.jpg")}}" alt="img" class="image-block imaged w48">
                        <div>
                            <strong>{{ $payments['payment_title']  }}</strong>
                            <p>Clique para mais informa&ccedil;&atilde;o</p>
                        </div>
                    </div>
                    <div class="right">
                        @if($payments['payer_wallet_id'] == $walletId)
                            <div class="price text-danger"> - {{  number_format($payments['payment_amount'],2) }} mzn</div>
                        @else
                            <div class="price text-success"> + {{  number_format($payments['payment_amount'],2) }} mzn</div>
                        @endif
                    </div>
                </a>
                <!-- * item -->
            @endif
          @endforeach
       </div>
   </div>
   <!-- * Transactions -->


   
</div>