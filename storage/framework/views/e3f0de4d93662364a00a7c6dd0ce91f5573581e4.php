<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New message</h4>
            </div>
            <div class="modal-body">
                <div class="model-message">

                </div>
                <?php echo $__env->yieldContent('modal-content'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary submit-form">OK</button>
            </div>
        </div>
    </div>
</div>