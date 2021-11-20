<div class="row">
    <div class="col-xs-4">
        <input type="text" value="{{ isset($product) ? $product->product_name : '' }}" class="form-control required" name="product_name" placeholder="Enter Product Name">
    </div>
    <div class="col-xs-4">
        <input type="text" value="{{ isset($product) ? $product->product_qty : '' }}"  class="form-control required" name="product_qty" placeholder="Enter Product Quantity">
    </div>
    <div class="col-xs-4">
        <div class="input-group">
            <span class="input-group-addon">{{ $setting->currency }}</span>
            <input type="number" value="{{ isset($product) ? $product->product_price : '' }}"  name="product_price" class="form-control required" placeholder="0.00" aria-describedby="sizing-addon1">
        </div>
    </div>
    <br><br>
    <div class="col-xs-12">
        <textarea  cols="2" value="{{ isset($product) ? $product->product_desc : '' }}"  class="form-control required" rows="2" name="product_desc" placeholder="Enter Product Description"></textarea>
    </div>
</div>

