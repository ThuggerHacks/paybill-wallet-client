@extends("layouts.layout")

@section("title","Depositos")

@section("content")

@include("_partials.header",["title" => "Depositos"])

<!-- App Capsule -->
<div id="appCapsule">
     <!-- Transactions -->
     <div class="section mt-2">
        {{-- <div class="section-title">Today</div> --}}
        <div class="transactions">
           @foreach ($data['deposits']['data'] as $deposit)
               <!-- item -->
                <a href="{{ route("transation.details") }}" class="item">
                    <div class="detail">
                        <img src="{{ asset("assets/img/sample/brand/1.jpg")}}" alt="img" class="image-block imaged w48">
                        <div>
                            <strong>{{ $data['wallet']['wallet_title'] }}</strong>
                            <p>ref:{{ $deposit['deposit_reference']}}</p>
                            <p>data: {{ $deposit['deposited_at']}}</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-success"> +  {{  number_format($deposit['deposit_amount'],2) }} mzn</div>
                    </div>
                </a>
            <!-- * item -->
           @endforeach
        </div>
    </div>
    <!-- * Transactions -->

    
    <div class="row" style="display: flex;justify-content:center;flex-wrap:wrap">

        @if($data['deposits']['prev_page_url'])
            <div class="section mt-2 mb-2 col-md-2">
                <a href="{{ route("deposits",["wallet_id" => urlencode(base64_encode($data['wallet']['wallet_id'])), "page" => ($data['deposits']['current_page'] - 1)] )}}" class="btn btn-primary btn-block btn-lg">Anterior</a>
            </div>
        @endif

        @if($data['deposits']['next_page_url'])
            <div class="section mt-2 mb-2 col-md-2">
                <a href="{{ route("deposits",["wallet_id" => urlencode(base64_encode($data['wallet']['wallet_id'])), "page" => ($data['deposits']['current_page'] + 1)] )}}" class="btn btn-primary btn-block btn-lg">Proximo</a>
            </div>
        @endif
    </div>
    
</div>

<x-bottom-tab :user="false" :config="false" ></x-bottom-tab>


@endsection