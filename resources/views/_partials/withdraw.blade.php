<!-- Withdraw Action Sheet -->
<div class="modal fade action-sheet" id="withdrawActionSheet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Retirar dinheiro</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form action="{{ route("withdraw.create") }}" method="POST">
                        @csrf
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="account2d">A partir de</label>
                                <select class="form-control custom-select" id="account2d" name="from">
                                    @if(isset($wallets))
                                        @foreach ($wallets as $wallet)
                                            @if($wallet['wallet_activated_status'])
                                                    <option value="{{ base64_encode($wallet['wallet_id']) }}" selected>{{ $wallet['wallet_title'] }}</option>
                                            @else
                                                    <option value="{{ base64_encode($wallet['wallet_id']) }}" >{{ $wallet['wallet_title'] }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="text11d">Senha</label>
                                <input type="password" class="form-control" id="text11d" placeholder="Sua Senha">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div> --}}

                        <div class="form-group basic">
                            <label class="label">Valor</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addonb1">$</span>
                                <input type="text" class="form-control" placeholder="Insira um valor"
                                    name="amount">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"
                                data-bs-dismiss="modal">Retirar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Withdraw Action Sheet -->