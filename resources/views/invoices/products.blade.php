    <table class="table table-bordered1 table-hover table-striped" id="invoice_table">
        <thead>
            <tr>
                <th width="400">
                    @if (isset($invoice))
                    @else
                    <h4><a href="#" class="btn btn-success btn-xs add-row"><span class="glyphicon glyphicon-plus"
                        aria-hidden="true"></span></a> Product</h4>
                    @endif

                </th>
                <th>
                    <h4>Qty</h4>
                </th>
                <th>
                    <h4>Price</h4>
                </th>
                <th width="200">
                    <h4>Discount</h4>
                </th>
                <th>
                    <h4>Sub Total</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            @if (isset($invoice))
                @foreach ($invoice->invoiceDetails as $invoice_detail)
                    <tr>
                        <td>
                            <div class="form-group form-group-sm  no-margin-bottom">
                                <a href="#" class="btn btn-danger btn-xs delete-row"><span
                                        class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                <input type="text" class="form-control form-group-sm item-input invoice_product"
                                    name="invoice_product[]"
                                    value="{{ $invoice_detail->product->product_name }}  &nbsp; (Qty - {{ $invoice_detail->product->product_qty }})"
                                    placeholder="Enter Product Name OR Description">
                                <p class="item-select">or <a href="#" class="btn btn-primary btn-sm"
                                        data-toggle="tooltip" data-placement="right" title="Select a Product">select</a>
                                </p>
                            </div>
                            <input type="hidden" name="invoice_detail_id[]" value="{{ $invoice_detail->id }}"
                                id="invoice_detail_id">
                        </td>
                        <td class="text-right">
                            <div class="form-group form-group-sm no-margin-bottom">
                                <input type="number" class="form-control invoice_product_qty calculate"
                                    name="invoice_product_qty[]" value="{{ $invoice_detail->qty }}">
                                <input type="hidden" name="product_id[]" value="{{ $invoice_detail->product_id }}"
                                    id="product_id" class="invoice_product_id">
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="input-group input-group-sm  no-margin-bottom">
                                <span class="input-group-addon">{{ $setting->currency }}</span>
                                <input type="number" class="form-control calculate invoice_product_price required"
                                    name="invoice_product_price[]" readonly value="{{ $invoice_detail->price }}"
                                    aria-describedby="sizing-addon1" placeholder="0.00">
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="form-group form-group-sm  no-margin-bottom">
                                <input type="text" class="form-control calculate" name="invoice_product_discount[]"
                                    value="{{ $invoice_detail->discount }}"
                                    placeholder="Enter % OR value (ex: 10% or 10.50)">
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon">{{ $setting->currency }}</span>
                                <input type="text" class="form-control calculate-sub" name="invoice_product_sub[]"
                                    value="{{ $invoice_detail->subtotal }}" id="invoice_product_sub" value="0.00"
                                    aria-describedby="sizing-addon1" disabled>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>
                        <div class="form-group form-group-sm  no-margin-bottom">
                            <a href="#" class="btn btn-danger btn-xs delete-row"><span
                                    class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            <input type="text" class="form-control form-group-sm item-input invoice_product"
                                name="invoice_product[]" placeholder="Enter Product Name OR Description">
                            <p class="item-select">or <a href="#" class="btn btn-primary btn-sm"
                                    data-toggle="tooltip" data-placement="right" title="Select a Product">select</a></p>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="form-group form-group-sm no-margin-bottom">
                            <input type="number" class="form-control invoice_product_qty calculate"
                                name="invoice_product_qty[]" value="1">
                            <input type="hidden" name="product_id[]" id="product_id" class="invoice_product_id">
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="input-group input-group-sm  no-margin-bottom">
                            <span class="input-group-addon">{{ $setting->currency }}</span>
                            <input type="number" class="form-control calculate invoice_product_price required"
                                name="invoice_product_price[]" aria-describedby="sizing-addon1" placeholder="0.00">
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="form-group form-group-sm  no-margin-bottom">
                            <input type="text" class="form-control calculate" name="invoice_product_discount[]"
                                placeholder="Enter % OR value (ex: 10% or 10.50)">
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">{{ $setting->currency }}</span>
                            <input type="text" class="form-control calculate-sub" name="invoice_product_sub[]"
                                id="invoice_product_sub" value="0.00" aria-describedby="sizing-addon1" disabled>
                        </div>
                    </td>
                </tr>
            @endif

        </tbody>
    </table>
