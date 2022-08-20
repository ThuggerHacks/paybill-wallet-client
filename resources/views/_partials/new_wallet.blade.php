 <!-- Dialog Form -->
 <div class="modal fade dialogbox" id="wallet_new" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CRIAR CARTEIRA</h5>
            </div>
            <form>
                <div class="modal-body text-start mb-2">

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text1">Digite o titulo da carteira</label>
                            <input type="text" class="form-control" id="text1" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text2">Digite um numero para associar</label>
                            <input type="number" class="form-control" id="text2" >
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
                        <button type="button" class="btn btn-text-primary"
                            data-bs-dismiss="modal">ADICIONAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- * Dialog Form -->