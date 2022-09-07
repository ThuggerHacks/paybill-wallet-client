@extends("layouts.layout")

@section("title","Transition - detalhes")


@section("content")

 <!-- App Header -->
 <div class="appHeader">
    <div class="left">
        <a href="#" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        Detalhe da transação
    </div>
    <div class="right">
        {{-- <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#DialogBasic">
            <ion-icon name="trash-outline"></ion-icon>
        </a> --}}
    </div>
</div>
<!-- * App Header -->

<x-delete-modal></x-delete-modal>

 <!-- App Capsule -->
 <div id="appCapsule" class="full-height">

    <div class="section mt-2 mb-2">


        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <div class="iconbox">
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>
            </div>
            @if($type == 'deposit')
                <h3 class="text-center mt-2">Depositado</h3>
            @elseif ($type == "withdraw")
                <h3 class="text-center mt-2">Levantado</h3>
            @elseif ($type == "transfer")
                <h3 class="text-center mt-2">Transferido</h3>
            @elseif ($type == "received")
                <h3 class="text-center mt-2">Recebido</h3>
            @elseif($type == "payment")
                <h3 class="text-center mt-2">Pago</h3>
            @endif
        </div>

        <ul class="listview flush transparent simple-listview no-space mt-3">
            <li>
                <strong>Estado</strong>
                <span class="text-success">Sucesso</span>
            </li>
            <li>
                <strong>A partir de</strong>
                <span>
                    @if($type == "deposit")
                        {{$data['deposit']['deposit_from']}}
                    @elseif ($type == "withdraw")
                        {{$data['wallet']['wallet_title']}} ( {{$data['wallet']['wallet_id']}} )
                    @elseif ($type == "transfer")
                        {{$data['wallet']['wallet_title']}} ( {{$data['wallet']['wallet_id']}} )
                    @elseif($type == "received")
                        {{$data['transfer']['sent_from_wallet_id']}} 
                    @elseif($type == "payment")
                        {{$data['payments']['payer_wallet_id']}} 
                    @endif
                </span>
            </li>
            <li>
                <strong>Para</strong>
                <span>
                    @if($type == "deposit")
                        {{$data['wallet']['wallet_title']}} ( {{$data['wallet']['wallet_id']}} )
                    @elseif ($type == "withdraw")
                        {{$data['wallet']['wallet_associated_phone_number']}}
                    @elseif ($type == "transfer")
                        {{$data['transfer']['sent_to_wallet_id']}}
                    @elseif ($type == "received")
                        {{$data['transfer']['sent_to_wallet_id']}} 
                    @elseif($type == "payment")
                        {{$data['payments']['wallet_id']}} 
                    @endif
                </span>
            </li>
            <li>
                <strong>Nome do banco</strong>
                <span>Paybill</span>
            </li>
            <li>
                <strong>Referencia</strong>
                <span>
                    @if($type == "deposit")
                        {{$data['deposit']['deposit_reference']}}
                    @elseif ($type == "withdraw")
                        {{$data['withdraw']['withdraw_reference']}}
                    @elseif ($type == "transfer" || $type == "received")
                        {{$data['transfer']['sent_reference']}}
                    @elseif($type == "payment")
                        {{$data['payments']['payment_reference']}}
                    @endif
                </span>
            </li>
            
            <li>
                <strong>Data e Hora</strong>
                <span>
                    @if($type == "deposit")
                        {{$data['deposit']['deposited_at']}}
                    @elseif ($type == "withdraw")
                        {{$data['withdraw']['withdraw_at']}}
                    @elseif ($type == "transfer" || $type == "received")
                        {{$data['transfer']['sent_at']}}
                    @elseif($type == "payment")
                        {{$data['payments']['payment_reference']}}
                    @endif
                </span>
            </li>
            <li>
                <strong>Valor</strong>
                <h3 class="m-0">
                    @if($type == "deposit")
                        {{ number_format($data['deposit']['deposit_amount'],2) }}
                    @elseif ($type == "withdraw")
                        {{ number_format($data['withdraw']['withdraw_amount'],2) }}
                    @elseif ($type == "transfer" || $type == "received")
                        {{ number_format($data['transfer']['sent_amount'],2) }}
                    @elseif($type == "payment")
                        {{ number_format($data['payments']['payment_amount'],2) }}
                    @endif
                    mzn
                </h3>
            </li>
        </ul>


    </div>

</div>
<!-- * App Capsule -->

<x-bottom-tab :user="false" :config="false" ></x-bottom-tab>


@endsection