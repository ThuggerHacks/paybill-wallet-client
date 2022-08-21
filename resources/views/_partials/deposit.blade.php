 <!-- Deposit Action Sheet -->
 <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar saldo</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form action="{{ route("deposit.create") }}" method="POST">
                        @csrf
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="account1">Para</label>
                                <select class="form-control custom-select" id="account1" name="to">
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

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="text11">A partir de</label>
                                <input type="number" class="form-control" id="text11"
                                    placeholder="Digite o numero de celular" name="from">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <label class="label">Valor</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addona1">$</span>
                                <input type="number" class="form-control" placeholder="Insira um valor"
                                   name="amount">
                            </div>
                        </div>


                        <div class="form-group basic">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"
                                data-bs-dismiss="modal">Depositar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Deposit Action Sheet -->