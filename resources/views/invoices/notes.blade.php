<div id="invoice_totals" class="padding-right  row text-right">
    <div class="col-xs-6">
        <div class="input-group form-group-sm textarea no-margin-bottom">
            <textarea class="form-control" name="invoice_notes" value="{{ isset($invoice)? $invoice->note : '' }}" placeholder="Additional Notes..."></textarea>
        </div>
    </div>
        <div class="col-xs-6 no-padding-right ">
            <div class="row ">
                <div class="col-xs-4 col-xs-offset-4">
                    <strong>Sub Total:</strong>
                </div>
                <div class="col-xs-4">
                    {{ $setting->currency }}&nbsp;<span class="invoice-sub-total">0.00</span>
                    <input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <strong>Discount %:</strong>
                </div>
                <div class="col-xs-4">
                    {{ $setting->currency }}&nbsp;<span class="invoice-discount"> 0.00</span>
                    <input type="hidden" name="invoice_discount" id="invoice_discount">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <strong class="shipping">Shipping Charges:</strong>
                </div>
                <div class="col-xs-4">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon"> {{ $setting->currency }}</span>
                        <input type="text" class="form-control calculate shipping" name="shipping_charges"
                            aria-describedby="sizing-addon1" value="{{ isset($invoice)? $invoice->shipping : '' }}" placeholder="0.00">
                    </div>
                </div>
            </div>
            @if ($setting->enable_tax == true)
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <strong>TAX:</strong><br>Remove TAX <input type="checkbox" @if(isset($invoice) ) {{ $invoice->vat == 0.00 ? 'checked' : '' }} @endif class="remove_vat">
                    </div>
                    <div class="col-xs-4">
                        {{ $setting->currency }}&nbsp;<span class="invoice-vat" data-enable-vat="{{ $setting->enable_tax }}" data-vat-rate="{{ $setting->tax_rate }}" data-vat-method="{{ $setting->include_tax }}">0.00</span>
                        <input type="hidden" name="invoice_vat" id="invoice_vat">
                    </div>
                </div>
             @endif
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <strong>Total:</strong>
                </div>
                <div class="col-xs-4">
                    {{ $setting->currency }}&nbsp;<span class="invoice-total"> 0.00</span>
                    <input type="hidden" name="invoice_total" id="invoice_total">
                </div>
            </div>
        </div>

    <div class="col-xs-12 margin-top btn-group">
        <input type="submit" id1="action_create_invoice" class="btn btn-success float-right" value="{{ isset($invoice) ? 'Update' : 'Create' }} Invoice"
            data-loading-text="Creating...">
    </div>

</div>
