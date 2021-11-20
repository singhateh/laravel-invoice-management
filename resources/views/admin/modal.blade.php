<div id="openCreateModal" class="modal right fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fa fa-times-circle fa-2x text-danger "></i>
                    </span></button>
                <h4 class="modal-title">Create New User</h4>
            </div>
            <div class="modal-body">
                <div id="ContainerTable">
                    @include('admin.fields')
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-success">Save Customer</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
