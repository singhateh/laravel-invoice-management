<div class="row">
    <div class="col-xs-3">
        <div class="input-group  float-left1">
            <span class="input-group-addon">Select Type</span>
            <select name="invoice_type" id="invoice_types" class="form-control">
                <option value="invoice" @if(isset($invoice)){{ $invoice->invoice_type == 'invoice' ? 'selected' : 'selected' }} @endif>Invoice</option>
                <option value="quote" @if(isset($invoice)){{ $invoice->invoice_type == 'quote' ? 'selected' : '' }} @endif>Quote</option>
                <option value="receipt" @if(isset($invoice)){{ $invoice->invoice_type == 'receipt' ? 'selected' : '' }} @endif>Receipt</option>
            </select>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="input-group  float-left1">
            <span class="input-group-addon">Select Status</span>
            <select name="invoice_status" id="invoice_statuses" class="form-control">
                <option value="open" @if(isset($invoice)){{ $invoice->status == 'open' ? 'selected' : 'selected' }} @endif>Open</option>
                <option value="paid" @if(isset($invoice)){{ $invoice->status == 'paid' ? 'selected' : '' }} @endif>Paid</option>
                <option value="patial" @if(isset($invoice)){{ $invoice->status == 'patial' ? 'selected' : '' }} @endif>Patial</option>
                <option value="overpaid" @if(isset($invoice)){{ $invoice->status == 'overpaid' ? 'selected' : '' }} @endif>Overpaid</option>
            </select>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group">
            <div class="input-group date" id="invoice_date">
                <input type="text" class="form-control required" name="invoice_date" placeholder="Invoice Date"
                    data-date-format1="DATE_FORMAT" value="{{  isset($invoice) ? $invoice->invoice_date  : ''}}" />
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
                    data-date-format1="DATE_FORMAT"  value="{{  isset($invoice) ? $invoice->invoice_due_date  : ''}}"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
        <div class="col-xs-6 col-xs-offset-4">
            <strong>DOWNLOAD PDF RECEIPT </strong><input type="radio" checked name="option" value="download" class="">
            <strong>PREVIEW  PDF RECEIPT </strong><input type="radio" name="option" value="preview" class="">
            <strong>DONT INCLUDE RECEIPT </strong><input type="radio" name="option" value="excel" class="">
        </div>
</div>
