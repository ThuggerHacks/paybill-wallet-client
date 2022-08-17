 <!-- Dialog Form -->
 <div class="modal fade dialogbox" id="DialogForm" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CHANGE PROFILE</h5>
            </div>
            <form>
                <div class="modal-body text-start mb-2">

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text1">Enter New Name</label>
                            <input type="text" class="form-control" id="text1" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text2">Enter New Email</label>
                            <input type="email" class="form-control" id="text2" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="text3">Enter New Phone Number</label>
                            <input type="number" class="form-control" id="text3">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <button type="button" class="btn btn-text-secondary"
                            data-bs-dismiss="modal">CANCEL</button>
                        <button type="button" class="btn btn-text-primary"
                            data-bs-dismiss="modal">CHANGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- * Dialog Form -->