<div class="row">
    <div class="col-xs-4">
        <input type="text" value="{{ isset($product) ? $product->product_name : '' }}" class="form-control required" name="product_name" placeholder="Enter Product Name">
    </div>
    <div class="col-xs-4">
        <input type="text" value="{{ isset($product) ? $product->product_qty : '' }}"  class="form-control required" name="product_qty" placeholder="Enter Product Quantity">
    </div>
    <div class="col-xs-4">
        <div class="input-group">
            <span class="input-group-addon">Currency</span>
            <input type="number" value="{{ isset($product) ? $product->product_price : '' }}"  name="product_price" class="form-control required" placeholder="0.00" aria-describedby="sizing-addon1">
        </div>
    </div>
    <br><br>
    <div class="col-xs-12">
        <textarea  cols="50" value="{{ isset($product) ? $product->product_desc : '' }}"  class="form-control required" rows="50" name="product_desc" placeholder="Enter Product Description"></textarea>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 margin-top btn-group">
        <input type="submit" id="action_add_product" class="btn btn-success float-right" value="Add Product" data-loading-text="Adding...">
    </div>
</div>
