<!-- App Sidebar -->
<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <!-- profile box -->
                <div class="profileBox pt-2 pb-1">
                    <div class="in">
                        @php($wallet_id = 0)
                        @if(isset($wallets))
                            @foreach ($wallets as $wallet)
                                @if($wallet['wallet_activated_status'])
                                    <strong>{{ $wallet['wallet_title'] }}</strong>
                                    <div class="text-muted">{{ $wallet['wallet_id'] }}</div>
                                    @php($wallet_id = $wallet['wallet_id'])
                                @endif
                            @endforeach
                        @endif
                       
                    </div>
                    <a href="#" class="btn btn-link btn-icon sidebar-close"  style="position:absolute;left:75%" data-bs-target="#wallet_update" data-bs-toggle="modal"  data-bs-dismiss="modal" onclick="closeMenu()">
                        <ion-icon name="pencil-outline"></ion-icon>
                    </a>

                    <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                        <ion-icon name="close-outline"></ion-icon>
                    </a>
    
                </div>
                <!-- * profile box -->
                <!-- balance -->
                <div class="sidebar-balance">
                    <div class="listview-title">Saldo</div>
                    <div class="in">
                        <h1 class="amount">
                            @if(isset($wallets))
                                @foreach ($wallets as $wallet)
                                    @if($wallet['wallet_activated_status'])
                                        {{number_format( $wallet['wallet_money'],2)}} mzn
                                    @endif
                                @endforeach
                            @endif
                        </h1>
                    </div>
                </div>
                <!-- * balance -->

                <!-- action group -->
                <div class="action-group">
                    <a href="{{ route("deposits",urlencode(base64_encode($wallet_id))) }}" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                            Depósitos
                        </div>
                    </a>
                    <a href="{{ route("withdraw",urlencode(base64_encode($wallet_id))) }}" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            Retiradas
                        </div>
                    </a>
                    <a href="{{ route("sends",urlencode(base64_encode($wallet_id))) }}" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </div>
                            Envios
                        </div>
                    </a>
                    <a href="{{ route("received",urlencode(base64_encode($wallet_id)))}}" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            Recebidos
                        </div>
                    </a>
                </div>
                <!-- * action group -->

                <!-- menu -->
                <div class="listview-title mt-1">Menu</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="{{ route("home") }}" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="pie-chart-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Visão geral
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route("payments") }}" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Pagamentos
                            </div>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="app-pages.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Pages
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="app-components.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="apps-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Components
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="app-cards.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <div class="in">
                                My Cards
                            </div>
                        </a>
                    </li> --}}
                </ul>
                <!-- * menu -->

                <!-- others -->
                <div class="listview-title mt-1">Outros</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="{{ route("user.config") }}" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="settings-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Definições
                            </div>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="component-messages.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Support
                            </div>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route("logout") }}" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Sair
                            </div>
                        </a>
                    </li>


                </ul>
                <!-- * others -->

                <!-- send money -->
               
        </div>
    </div>
</div>
<!-- * App Sidebar -->

<script>

    const closeMenu = () => {
        document.querySelector("#sidebarPanel").classList.remove('show')
    }
</script>