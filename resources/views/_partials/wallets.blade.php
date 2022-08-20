<!-- Exchange Action Sheet -->
<div class="modal fade action-sheet" id="walletsActionSheet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Selecionar carteira</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form action="{{ route("activate.wallet") }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="currency1">Carteira</label>
                                        <select class="form-control custom-select" id="currency1" name="wallet">

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
                            </div>
                           
                        </div>


                        <div class="form-group basic">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"
                                data-bs-dismiss="modal">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Exchange Action Sheet -->
