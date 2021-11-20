<div id="openCreateModal" class="modal right fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fa fa-times-circle fa-2x text-danger "></i>
                    </span></button>
                <h4 class="modal-title">Create a New Customer</h4>
            </div>
            <div class="modal-body">
                <div id="ContainerTable">
                    @if (Request::is('customers*'))
                    @include('customers.fields')
                    @else
                    @include('customers.table')
                    <input type="hidden" name="customer_id"
                        value="{{ isset($invoice) ? $invoice->customer->id : '' }}" id="customer_id"
                        class="customer_id">
                    @endif
                </div>
            </div>
            @if (Request::is('customers*'))
            <div class="modal-footer">
                <button type="submit"  class="btn btn-success">Save Customer</button>
            </div>
            @endif

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
