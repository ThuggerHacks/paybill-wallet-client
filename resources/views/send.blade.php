@extends("layouts.layout")

@section("title","Depositos")

@section("content")

@include("_partials.header",["title" => "Transferencias"])

<!-- App Capsule -->
<div id="appCapsule">
     <!-- Transactions -->
     <div class="section mt-2">
        {{-- <div class="section-title">Today</div> --}}
        <div class="transactions">
           @foreach ($data['transfers']['data'] as $transfers)
                @if($transfers['sent_from_wallet_id'] == $data['wallet']['wallet_id'] )
                <!-- item -->
                    <a href="{{ route("transation.details",["type" => "transfer", "id" => urlencode(base64_encode($transfers['sent_reference']))]) }}" class="item">
                        <div class="detail">
                            <img src="{{ asset("assets/img/sample/brand/1.jpg")}}" alt="img" class="image-block imaged w48">
                            <div>
                                <strong>{{ $data['wallet']['wallet_title'] }}</strong>
                                <p>Clique para mais informa&ccedil;&atilde;o</p>
                            </div>
                        </div>
                        <div class="right">
                            <div class="price text-danger"> -  {{  number_format($transfers['sent_amount'],2) }} mzn</div>
                        </div>
                    </a>
                <!-- * item -->
                @endif
           @endforeach
        </div>
    </div>
    <!-- * Transactions -->

    
    <div class="row" style="display: flex;justify-content:center;flex-wrap:wrap">

        @if($data['transfers']['prev_page_url'])
            <div class="section mt-2 mb-2 col-md-2">
                <a href="{{ route("sends",["wallet_id" => urlencode(base64_encode($data['wallet']['wallet_id'])), "page" => ($data['transfers']['current_page'] - 1)] )}}" class="btn btn-primary btn-block btn-lg">Anterior</a>
            </div>
        @endif

        @if($data['transfers']['next_page_url'])
            <div class="section mt-2 mb-2 col-md-2">
                <a href="{{ route("sends",["wallet_id" => urlencode(base64_encode($data['wallet']['wallet_id'])), "page" => ($data['transfers']['current_page'] + 1)] )}}" class="btn btn-primary btn-block btn-lg">Proximo</a>
            </div>
        @endif
    </div>
    
</div>

<x-bottom-tab :user="false" :config="false" ></x-bottom-tab>


@endsection