 <!-- Dialog Form -->
 <div class="modal fade dialogbox" id="DialogForm" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">MUDAR PERFIL</h5>
            </div>
            <form action="{{ route("change.profile")}}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-body text-start mb-2">

                    @if($name)
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="text1">Digite o novo nome</label>
                                    <input type="text" class="form-control" id="text1" name="user_name">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                    @endif

                    @if($email)

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="text2">Digite o novo e-mail</label>
                                <input type="email" class="form-control" id="text2" name="user_email">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                    @endif

                    @if($number)

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="text3">Digite o novo número de telefone</label>
                                <input type="number" class="form-control" id="text3" name="user_phone_number">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                    @endif

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