<!-- Withdraw Action Sheet -->
<div class="modal fade action-sheet" id="withdrawActionSheet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Retirar dinheiro</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="account2d">A partir de</label>
                                <select class="form-control custom-select" id="account2d">
                                    <option value="0">Savings (*** 5019)</option>
                                    <option value="1">Investment (*** 6212)</option>
                                    <option value="2">Mortgage (*** 5021)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="text11d">Senha</label>
                                <input type="password" class="form-control" id="text11d" placeholder="Sua Senha">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <label class="label">Valor</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addonb1">$</span>
                                <input type="text" class="form-control" placeholder="Insira um valor"
                                    value="100">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <button type="button" class="btn btn-primary btn-block btn-lg"
                                data-bs-dismiss="modal">Retirar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Withdraw Action Sheet -->