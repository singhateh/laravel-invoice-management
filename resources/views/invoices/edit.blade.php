@extends('layouts.app')

@section('content')
    <div id="response" class="alert alert-success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <div class="message"></div>
    </div>
    {{-- <form method="post" id="create_invoice" action="{{ route('invoices.store') }}">
        @csrf
        <input type="hidden" name="action" value="create_invoice">

        <div class="row">
            <div class="col-sm-8">
                <h3>Create New <span class="invoice_type">Invoice</span></h3>
            </div>
            <div class="col-sm-2 pull-right">
                <a href="" class="btn btn-info btn-sm">IMPORT</a>
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-xs-2">
                <div class="input-group float-right1">
                    <span class="input-group-addon">#{{ $setting->invoice_prefix }}</span>
                    <input type="text" name="invoice_id" id="invoice_id" class="form-control required"
                        placeholder="Invoice Number" aria-describedby="sizing-addon1"
                        value="{{ isset($invoice) ? $invoice->id : $setting->invoice_initial_value }}">
                </div>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-xs-3">
                <div class="input-group  float-left1">
                    <span class="input-group-addon">Select Type</span>
                    <select name="invoice_type" id="invoice_types" class="form-control">
                        <option value="invoice" @if (isset($invoice)){{ $invoice->invoice_type == 'invoice' ? 'selected' : 'selected' }} @endif>Invoice</option>
                        <option value="quote" @if (isset($invoice)){{ $invoice->invoice_type == 'quote' ? 'selected' : '' }} @endif>Quote</option>
                        <option value="receipt" @if (isset($invoice)){{ $invoice->invoice_type == 'receipt' ? 'selected' : '' }} @endif>Receipt</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="input-group  float-left1">
                    <span class="input-group-addon">Select Status</span>
                    <select name="invoice_status" id="invoice_statuses" class="form-control">
                        <option value="open" @if (isset($invoice)){{ $invoice->status == 'open' ? 'selected' : 'selected' }} @endif>Open</option>
                        <option value="paid" @if (isset($invoice)){{ $invoice->status == 'paid' ? 'selected' : '' }} @endif>Paid</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <div class="input-group date" id="invoice_date">
                        <input type="text" class="form-control required" name="invoice_date" placeholder="Invoice Date"
                            data-date-format1="DATE_FORMAT" value="{{ isset($invoice) ? $invoice->invoice_date : '' }}" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <div class="input-group date" id="invoice_due_date">
                        <input type="text" class="form-control required" name="invoice_due_date" placeholder="Due Date"
                            data-date-format1="DATE_FORMAT"
                            value="{{ isset($invoice) ? $invoice->invoice_due_date : '' }}" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="#" class="float-right1 create-new-customer btn btn-primary btn-sm"> New Customer</a>
                        </div>
                        <div class="col-md-1"><b>OR</b></div>
                        <div class="col-md-3">
                            <a href="#" class="float-right1 select-existing-customer btn btn-warning btn-sm"> Select
                                Existing
                                Customer</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body form-group form-group-sm customers-templete" style="display: none">
                    @include('customers.fields')
                </div>
            </div>
        </div>
        @include('invoices.products')

        @include('invoices.modals')


    </form> --}}

    @include('invoices.modals')

    <input type="hidden" name="" id="InvoiceIndex" data-url="{{ route('invoices.index') }}">
    @if (Request::routeIs('invoices.edit', $invoice->id))
    <input type="hidden" name=""  id="editModalshow" value="editModalshow">
    @endif
@endsection
