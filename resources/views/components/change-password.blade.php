 <!-- Dialog Form -->
 <div class="modal fade dialogbox" id="DialogForm1" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mudar senha</h5>
            </div>
            <form>
                <div class="modal-body text-start mb-2">

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text1">Digite a senha antiga</label>
                            <input type="password" class="form-control" id="text1" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text2">Insira a nova senha</label>
                            <input type="password" class="form-control" id="text2" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text3">Confirme a nova senha</label>
                            <input type="password" class="form-control" id="text3" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <button type="button" class="btn btn-text-secondary"
                            data-bs-dismiss="modal">CANCELar</button>
                        <button type="button" class="btn btn-text-primary"
                            data-bs-dismiss="modal">MUDAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- * Dialog Form -->