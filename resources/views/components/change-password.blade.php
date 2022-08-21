 <!-- Dialog Form -->
 <div class="modal fade dialogbox" id="DialogForm1" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mudar senha</h5>
            </div>
            <form action="{{ route("change.password")}}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-body text-start mb-2">

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text1">Digite a senha antiga</label>
                            <input type="password" class="form-control" id="text1" name="user_password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text2">Insira a nova senha</label>
                            <input type="password" class="form-control" id="text2" name="user_new_password" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text3">Confirme a nova senha</label>
                            <input type="password" class="form-control" id="text3" name="user_confirm_new_password" >
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
                            data-bs-dismiss="modal">MUDAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- * Dialog Form -->