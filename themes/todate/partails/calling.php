<div class="modal fade" id="calling-modal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content dt_call_ing">
			<div class="dt_call_ing_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 9.2l5.213-3.65a.5.5 0 0 1 .787.41v12.08a.5.5 0 0 1-.787.41L17 14.8V19a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v4.2zM5 8v2h2V8H5z"></path></svg></div>
            <div class="modal-header">
                <h4 class="modal-title"><?php echo __('Calling');?> <?php echo $wo['calling_user']->username;?> ..</h4>
            </div>
            <div class="modal-body">
                <p><?php echo __('Please wait for your friend answer.');?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat red darken-1 btn-white cancel-call" onclick="Wo_CancelCall();"><?php echo __('Cancel');?></button>
            </div>
        </div>
    </div>
</div>