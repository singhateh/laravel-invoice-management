<form method="post" id="CurrentForm" action="{{ route('invoices.store') }}">
    @csrf
    <input type="hidden" name="action" value="create_invoice">
    <div id="openCreateModal" class="modal right fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if (isset($invoice))
                    <a href="{{ route('invoices.index') }}"  class="close"> <i class="fa fa-times-circle fa-2x text-danger "></i></a>
                    @else
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="fa fa-times-circle fa-2x text-danger "></i>
                        </span></button>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            @if (isset($invoice))
                            <h3>EDIT INVOICE #{{ $invoice->id }}</h3>
                            @else
                            <h3>CREATE A NEW <span class="invoice_type">Invoice</span></h3>
                            @endif
                        </div>
                        <div class="{{ isset($invoive) ? 'col-md-5' : 'col-md-2' }}">
                            <a href="#" class="float-right1 create-new-customer btn btn-primary btn-sm">
                                {{ isset($invoice) ? 'Customer Detail' : 'New Customer' }}</a>
                        </div>
                        @if (!isset($invoice))
                        <div class="col-md-1"><b>OR</b></div>
                        <div class="col-md-2">
                            <a href="#" class="float-right1 select-existing-customer btn btn-warning btn-sm"> Select
                                Existing
                                Customer</a>
                        </div>
                        @endif
                        <div class="col-xs-2 float-right">
                            <div class="input-group ">
                                <span class="input-group-addon">#{{ $setting->invoice_prefix  }}</span>
                                <input type="hidden" name="invoice_id_test" value="{{  isset($invoice) ? $invoice->id  : '' }}"  id="">
                                <input type="text" name="invoice_id" readonly id="invoice_id" class="form-control required"
                                    placeholder="Invoice Number" aria-describedby="sizing-addon1" value="{{  isset($invoice) ? $invoice->id  : $setting->invoice_initial_value }}">
                            </div>
                        </div>
                    </div>
                    @include('invoices.filters')
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
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="add_customer" class="modal right fade">
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

</form>


<div id="add_product" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><i class="fa fa-times-circle fa-2x text-danger "></i></span></button>
                <h4 class="modal-title">Select Product</h4>
            </div>
            <div class="modal-body">
                <select name="" class="form-control item-select" id="">
                    @foreach ($products as $product)
                        <option value="{{ $product->product_price }}" data-product-id="{{ $product->id }}">
                            {{ $product->product_name }} &nbsp; (Qty - {{ $product->product_qty }})</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="selected">Add</button>
                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


