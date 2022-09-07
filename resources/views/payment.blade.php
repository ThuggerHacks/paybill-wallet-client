@extends("layouts.layout")

@section("title","Pagamentos")

@section("content")

@include("_partials.header",["title" => "Pagamentos"])

<!-- App Capsule -->
<div id="appCapsule">
     <!-- Transactions -->
     <div class="section mt-2">
        {{-- <div class="section-title">Today</div> --}}
        <div class="transactions">
           @foreach ($data['payments']['data'] as $payments)
           
               <!-- item -->
                <a href="{{ route("transation.details",["type" => "payment", "id" => urlencode(base64_encode($payments['payment_reference']))]) }}" class="item">
                    <div class="detail">
                        <img src="{{ asset("assets/img/sample/brand/1.jpg")}}" alt="img" class="image-block imaged w48">
                        <div>
                            <strong>{{ $data['wallet']['wallet_title']  }}</strong>
                            <p>Clique para mais informa&ccedil;&atilde;o</p>
                        </div>
                    </div>
                    <div class="right">
                        @if($payments['payer_wallet_id'] == $wallet_id)
                            <div class="price text-danger"> - {{  number_format($payments['payment_amount'],2) }} mzn</div>
                        @else
                            <div class="price text-success"> + {{  number_format($payments['payment_amount'],2) }} mzn</div>
                        @endif
                    </div>
                </a>
            <!-- * item -->
           @endforeach
        </div>
    </div>
    <!-- * Transactions -->

    
    <div class="row" style="display: flex;justify-content:center;flex-wrap:wrap">

        @if($data['payments']['prev_page_url'])
            <div class="section mt-2 mb-2 col-md-2">
                <a href="{{ route("payments",["wallet_id" => urlencode(base64_encode($data['wallet']['wallet_id'])), "page" => ($data['payments']['current_page'] - 1)] )}}" class="btn btn-primary btn-block btn-lg">Anterior</a>
            </div>
        @endif

        @if($data['payments']['next_page_url'])
            <div class="section mt-2 mb-2 col-md-2">
                <a href="{{ route("payments",["wallet_id" => urlencode(base64_encode($data['wallet']['wallet_id'])), "page" => ($data['payments']['current_page'] + 1)] )}}" class="btn btn-primary btn-block btn-lg">Proximo</a>
            </div>
        @endif
    </div>
    
</div>

<x-bottom-tab :user="false" :config="false" ></x-bottom-tab>


@endsection