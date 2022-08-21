 <!-- Dialog Form -->
 <div class="modal fade dialogbox" id="wallet_update" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ATUALIZAR CARTEIRA</h5>

                @php($title ="")
                @php($phone = '')

                @if(isset($data))
                    @foreach ($data as $wallet)
                        @if($wallet['wallet_activated_status'])
                            @php($title = $wallet['wallet_title'])
                            @php($phone = $wallet['wallet_associated_phone_number'])
                        @endif
                    @endforeach
                @endif
            </div>
            <form action="{{ route("wallet.update",$wallet_id) }}" method="POST" >
                @csrf
                @method("PUT")
                <div class="modal-body text-start mb-2">

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text1">Digite o titulo da carteira</label>
                            <input type="text" class="form-control" id="text1" name="wallet_title" value="{{ $title }}">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text2">Digite um numero para associar</label>
                            <input type="number" class="form-control" id="text2" name="wallet_associated_phone_number" value="{{ explode("258",$phone)[1] }}">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <button type="button" class="btn btn-text-secondary"
                            data-bs-dismiss="modal">CANCELAR</button>
                        <button type="submit" class="btn btn-text-primary"
                           >ADICIONAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- * Dialog Form -->