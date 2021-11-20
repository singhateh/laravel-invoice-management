@extends('layouts.app')

@section('content')

<div class="panel-body">
    <div class="row">
        <div class="col-sm-11">
          <h3>Edit Product</h3>
        </div>
        <div class="col-sm-1 pull-right">
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left-o"></i> Back</a>
        </div>
    </div>
 </div>

<div id="response" class="alert alert-success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<div class="message"></div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body form-group form-group-sm">
				<form method="post"  action="{{ route('products.store') }}">
                    @csrf
					<input type="hidden" name="action" value="add_product">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
					@include('products.fields')

                    <div class="row">
						<div class="col-xs-12 margin-top btn-group">
							<input type="submit"  class="btn btn-success float-right" value="Update Product" data-loading-text="Creating...">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<div>

@endsection
