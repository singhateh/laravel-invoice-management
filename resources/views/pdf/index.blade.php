<link rel="stylesheet" href="{{ public_path('assets/css/print.css') }}">
<body>
    <div id="invoiceholder">
    <div id="invoice" class="effect21">

      <div id="invoice-top">
        <div class="logo"><img src="{{ !empty($setting['company_logo']) ? public_path('media/img/company/' . $setting['company_logo']) : public_path('image/logo.png')  }}"
         alt="Logo" align="center" border="0"></div>
        {{-- <div class="logo"><img src="https://www.almonature.com/wp-content/uploads/2018/01/logo_footer_v2.png" alt="Logo" /></div> --}}
        <div class="title">
          <h1>{{ Str::ucfirst($invoice->invoice_type) }} #<span class="invoiceVal invoice_num">{{ $invoice->id }}</span></h1>
          <p>Invoice Date: <span id="invoice_date">{{ date('d m Y'), strtotime($invoice->invoice_date) }}</span><br>
          <p>Due Date: <span id="invoice_date">{{ date('d m Y'), strtotime($invoice->invoice_due_date) }}</span><br>
             GL Date: <span id="gl_date">23 Feb 2018</span>
          </p>
        </div><!--End Title-->
      </div><!--End InvoiceTop-->



      <div id="invoice-mid">
        <div id="message">
          <h2 style="margin-left: 20px">Hello {{ $invoice->customer->name }},</h2>
          {{-- <p>Your invoice with invoice number #<span id="invoice_num">{{ $invoice->id }}</span> is created for <span id="supplier_name">TESI S.P.A.</span> which is 100% matched with PO and is waiting for your approval. <a href="javascript:void(0);">Click here</a> to login to view the invoice.</p> --}}
        </div>

          <div class="clearfix">
              <div class="col-left">
                  <div class="clientinfo">
                      <h2 id="supplier">{{ $setting->company_name }}</h2>
                       <p>
                        <b>Address: </b> <span id="address">{{  $setting->company_address_1 }}</span><br>
                       <b>City: </b> <span id="city">{{ $setting->company_city }}</span> &nbsp;&nbsp;
                        <span id="country">{{ $setting->company_country }}</span> - <span id="zip">{{ $setting->company_postcode }}</span><br>
                        <b>Tel: </b><span id="tax_num">{{ $setting->company_phone }}</span><br>
                        <b>Email: </b><span id="tax_num">{{ $setting->company_email }}</span>
                    </p>
                  </div>
              </div>
              <div class="col-right">
                <h2 id="supplier">SHIPPING TO</h2><br>
                <div class="clientinfo">
                    <h2 id="supplier">{{ $invoice->customer->ship_name }}</h2>
                     <p>
                      <b>NAME: </b> <span id="address">{{ $invoice->customer->ship_name }}</span><br>
                      <b>Address: </b> <span id="address">{{  $setting->company_address_1 }}</span><br>
                     <b>City: </b> <span id="city">{{ $invoice->customer->ship_city }}</span> &nbsp;&nbsp;
                      <span id="country">{{ $invoice->customer->ship_country }}</span> - <span id="zip">{{ $invoice->customer->ship_post_code }}</span><br>
                      <b>Tel: </b><span id="tax_num">{{ $invoice->customer->ship_phone }}</span><br>
                      <b>Email: </b><span id="tax_num">{{ $invoice->customer->ship_email ?? '--------------' }}</span>
                  </p>
                </div>
              </div>
          </div>
      </div><!--End Invoice Mid-->

      <div id="invoice-bot">

        <div id="table">
          <table class="table-main">
            <thead>
                <tr class="tabletitle">
                  <th>#</th>
                  <th  width="200">ITEM</th>
                  <th width="50">QTY</th>
                  <th width="100">UNIT PRICE</th>
                  <th width="50">DISCOUNT</th>
                  <th width="70">TOTAL</th>
                </tr>
            </thead>
            @foreach ($invoice->invoiceDetails as $key => $invoice_detail)
            <tr class="list-item" style="margin-bottom: 10px">
              <td data-label="Type" class="tableitem">{{ $key+1 }}</td>
              <td data-label="Description" class="tableitem">{{ $invoice_detail->product->product_name }}</td>
              <td data-label="Quantity" class="tableitem">{{ $invoice_detail->qty }}</td>
              <td data-label="Unit Price" class="tableitem">{{ $invoice_detail->price }}</td>
              <td data-label="Discount" class="tableitem">{{ $invoice_detail->discount }}</td>
              <td data-label="Total" class="total-row">{{ $invoice_detail->subtotal }}</td>
            </tr> <br>
            @endforeach
              <tr class="list-item total-row">
                  <th colspan="4" class="tableitem"></th>
                  <th  class="tableitem th">Total</th>
                  <td data-label="Grand Total" class="tableitem th">{{ $invoice->invoiceDetails->sum('subtotal') }}</td>
              </tr>
              <tr class="list-item total-row">
                <th colspan="4" class="tableitem"></th>
                <th  class="tableitem th">Discount</th>
                <td data-label="Grand Total" class="tableitem th">{{ $invoice->invoiceDetails->sum('discount') }}</td>
            </tr>
            <tr class="list-item total-row">
                <th colspan="4" class="tableitem"></th>
                <th  class="tableitem th">Shipping</th>
                <td data-label="Grand Total" class="tableitem th">{{ $invoice->shipping }}</td>
            </tr>
            <tr class="list-item total-row">
                <th colspan="4" class="tableitem"></th>
                <th  class="tableitem th">Tax</th>
                <td data-label="Grand Total" class="tableitem th">{{ $invoice->vat}}</td>
            </tr>
            <tr class="list-item total-row">
                <th colspan="4" class="tableitem"></th>
                <th  class="tableitem th ">Sub Total</th>
                <td data-label="Grand Total" class="tableitem th">{{ $invoice->invoiceDetails->sum('subtotal') + $invoice->invoiceDetails->sum('discount') + $invoice->shipping + $invoice->vat}}</td>
            </tr>
          </table>
        </div><!--End Table-->
        <div class="cta-group">
      </div>

      </div><!--End InvoiceBot-->
      <footer>
        <div id="legalcopy" class="clearfix">
          <p class="col-right">Our mailing address is:
              <span class="email"><a href="www.jambasangsang.com">{{ $setting->company_email }}</a></span>
          </p>
        </div>
      </footer>
    </div><!--End Invoice-->
  </div><!-- End Invoice Holder-->
  </body>
