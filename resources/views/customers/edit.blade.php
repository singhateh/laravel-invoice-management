@extends('layouts.app')

@section('content')

<div class="panel-body">
    <div class="row">
        <div class="col-sm-11">
          <h3>Edit Customer</h3>
        </div>
        <div class="col-sm-1 pull-right">
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
			<div class="panel-body form-group form-group-sm">
				<form method="post" id="1create_customer" action="{{ route('customers.store') }}">
                    @csrf
					<input type="hidden" name="action" value="create_customer">
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
					@include('customers.fields')
					<div class="row">
						<div class="col-xs-12 margin-top btn-group">
							<input type="submit" id1="action_create_customer" class="btn btn-success float-right" value="Update Customer" data-loading-text="Creating...">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<div>

@endsection
