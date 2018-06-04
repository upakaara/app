<div class="modal fade" tabindex="-1" role="dialog" id="confirmationModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 id="confirmationModalTitle" class="modal-title">
            </div>
            <div class="modal-footer">
                <form method="post" id="confirmationForm">
                    {{ csrf_field() }}
                    <input type="hidden" id='formHiddenField'>
                    <button id="submitButton" type="submit" class="btn btn-default btn-lg">Yes</button>
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>