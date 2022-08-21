<!-- Dialog Image -->
<div class="modal fade dialogbox" id="DialogImage" data-bs-backdrop="static" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <img src="{{ asset("assets/img/sample/photo/1.jpg") }}" alt="image" class="img-fluid" id="img" onclick="openFile()">
            <div class="modal-footer">
                <div class="btn-inline">
                    <input type="file" name="file1" id="file" accept="image/*" style="display: none" onchange="setFile(event)" >
                    <button  class="btn btn-text-secondary" data-bs-dismiss="modal">CANCELAR</button>
                    <button type="button" class="btn btn-text-primary" data-bs-dismiss="modal">ALTERAR</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Dialog Image -->

<script>

    // const openFile = () => {
    //     let file = document.querySelector("#file");
    //     file.click();
    // }

    // const setFile = (evt) => {
    //     document.querySelector("#img").src = URL.createObjectURL(evt.target.files[0]);
    // }
</script>