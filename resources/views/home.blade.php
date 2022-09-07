@extends("layouts.layout")

@section("title","Home")
@section("content")

<x-navbar></x-navbar>

<!-- Wallet Card -->
<div id="appCapsule">
    <div class="section wallet-card-section pt-1">
        <div class="wallet-card">
            <!-- Balance -->
            <div class="balance">
                <div class="left">
                    <span class="title">Saldo total</span>
                    <h1 class="total">
                        @php($wallet_id = 0)
                        @if(isset($wallets))
                            @foreach ($wallets as $wallet)
                                @if($wallet['wallet_activated_status'])
                                     {{number_format( $wallet['wallet_money'],2)}} mzn
                                     @php($wallet_id = $wallet['wallet_id'] )
                                @endif
                            @endforeach
                        @endif
                    </h1>
                </div>
                <div class="right">
                    <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
                        <ion-icon name="add-outline"></ion-icon>
                    </a>
                </div>
            </div>
            <!-- * Balance -->
            <!-- Wallet Footer -->
            <div class="wallet-footer">
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawActionSheet">
                        <div class="icon-wrapper bg-danger">
                            <ion-icon name="arrow-down-outline"></ion-icon>
                        </div>
                        <strong>Retirar</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#sendActionSheet">
                        <div class="icon-wrapper">
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </div>
                        <strong>Transferir</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#walletsActionSheet">
                        <div class="icon-wrapper bg-success">
                            <ion-icon name="card-outline"></ion-icon>
                        </div>
                        <strong>Carteiras</strong>
                    </a>
                </div>
                <div class="item">
                    
                    <a href="#" data-bs-toggle="modal" data-bs-target="#wallet_new" id="wallet_">
                        <div class="icon-wrapper bg-warning">
                            <ion-icon name="add"></ion-icon>
                        </div>
                        <strong>Nova carteira</strong>
                    </a>
                </div>

            </div>
            <!-- * Wallet Footer -->
        </div>
    </div>
    <!-- Wallet Card -->

    @include("_partials.deposit")
    @include("_partials.withdraw")
    @include("_partials.sent")
    @include("_partials.wallets")
    @include("_partials.new_wallet")
    @include("_partials.wallet_update",["wallet_id" => $wallet_id,"data" => $wallets])

     <!-- Stats -->
     <div class="section">
        <div class="row mt-2">
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">Income</div>
                    <div class="value text-success">$ 552.95</div>
                </div>
            </div>
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">Expenses</div>
                    <div class="value text-danger">$ 86.45</div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">Total Bills</div>
                    <div class="value">$ 53.25</div>
                </div>
            </div>
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">Savings</div>
                    <div class="value">$ 120.99</div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- * Stats -->
    <x-modal-info ></x-modal-info>
    <x-transation :data="$data" :walletId="$wallet_id"></x-transation>
    <x-footer></x-footer>
    <x-bottom-tab :user="true" :config="false" ></x-bottom-tab>
    <x-slide-bar :wallets="$wallets"></x-slide-bar>
</div>



@endsection

<script>
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");

</script>