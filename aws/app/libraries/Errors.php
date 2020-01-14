<?php
/*
   * App Errors Class
   * Display Web Service Error Messages
*/
class Errors {
    //Error Modal
    public function WebServiceError($data,$title,$modalID){
    ?>
        <div class="modal fade bd-example-modal-sm" id="<?php echo($modalID) ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel"><?php echo($title) ?></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo($data); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="location.href = '../users/main';" class="btn btn-secondary btn-sm" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    }
}

