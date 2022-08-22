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
        <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#DialogBasic">
            <ion-icon name="trash-outline"></ion-icon>
        </a>
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
            @endif
        </div>

        <ul class="listview flush transparent simple-listview no-space mt-3">
            <li>
                <strong>Status</strong>
                <span class="text-success">Sucesso</span>
            </li>
            <li>
                <strong>Para</strong>
                <span>{{ $data['deposit_to_wallet_id'] }}</span>
            </li>
            <li>
                <strong>Nome do banco</strong>
                <span>Envato Bank</span>
            </li>
            <li>
                <strong>Referencia</strong>
                <span>{{ $data['deposit_reference'] }}</span>
            </li>
            {{-- <li>
                <strong>Recibo</strong>
                <span>Yes</span>
            </li> --}}
            <li>
                <strong>Data e Hora</strong>
                <span>{{ $data['deposited_at'] }}</span>
            </li>
            <li>
                <strong>Valor</strong>
                <h3 class="m-0">{{ number_format($data['deposit_amount'],2) }}mzn</h3>
            </li>
        </ul>


    </div>

</div>
<!-- * App Capsule -->

<x-bottom-tab :user="false" :config="false" ></x-bottom-tab>


@endsection