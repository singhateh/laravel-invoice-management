@extends('layouts.app')

@section('content')

<div class="panel-body">
    <div class="row">
        <div class="col-sm-10">
          <h3>Create Product</h3>
        </div>
        <div class="col-sm-2 pull-right">
            <a href="" class="btn btn-info btn-sm">IMPORT</a>
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
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
			{{-- <div class="panel-heading">
				<h4>Product Information</h4>
			</div> --}}
			<div class="panel-body form-group form-group-sm">
				<form method="post" id="add_product" action="{{ route('products.store') }}">
                    @csrf
					<input type="hidden" name="action" value="add_product">
					@include('products.fields')
				</form>
			</div>
		</div>
	</div>
<div>

@endsection
