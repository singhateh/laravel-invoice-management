<div id="add_new_invoice" class="modal right fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fa fa-times-circle fa-2x text-danger "></i>
                    </span></button>
                <div class="row">
                    <div class="col-md-4">
                        <h3>CREATE A NEW <span class="invoice_type">Invoice</span></h3>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="float-right1 create-new-customer btn btn-primary btn-sm"> New
                            Customer</a>
                    </div>
                    <div class="col-md-1"><b>OR</b></div>
                    <div class="col-md-2">
                        <a href="#" class="float-right1 select-existing-customer btn btn-warning btn-sm"> Select
                            Existing  Customer</a>
                    </div>
                    <div class="col-xs-2">
                        <div class="input-group float-right1">
                            <span class="input-group-addon">#{{ $setting->invoice_prefix }}</span>
                            <input type="text" readonly name="invoice_id" id="invoice_id" class="form-control required"
                                placeholder="Invoice Number" aria-describedby="sizing-addon1"
                                value="{{ isset($invoice) ? $invoice->invoice_number : $setting->invoice_initial_value }}">
                        </div>
                    </div>
                </div>
                @include('invoices.header')
            </div>
            <div class="modal-body" id="ContainerModal">
                @include('invoices.fields')
            </div>
            <div class="modal-footer">
                @include('invoices.notes')
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="add_new_customer" class="modal left fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fa fa-times-circle fa-2x text-danger "></i>
                    </span></button>
                <h4 class="modal-title">New Customer</h4>
            </div>
            <div class="modal-body">
                <div id="ContainerTable">
                    @include('customers.fields')
                    {{-- <input type="hidden" name="customer_id"
                        value="{{ isset($invoice) ? $invoice->customer->id : '' }}" id="customer_id"
                        class="customer_id"> --}}
                </div>
            </div>
            {{-- <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn">Cancel</button>
        </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="insert_customer" class="modal right fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fa fa-times-circle fa-2x text-danger "></i>
                    </span></button>
                <h4 class="modal-title">Select An Existing Customer</h4>
            </div>
            <div class="modal-body">
                <div id="ContainerTable">
                    @include('customers.table')
                    <input type="hidden" name="customer_id"
                        value="{{ isset($invoice) ? $invoice->customer->id : '' }}" id="customer_id"
                        class="customer_id">
                </div>
            </div>
            {{-- <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">Cancel</button>
        </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
