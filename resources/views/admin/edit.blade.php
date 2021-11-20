@extends('layouts.app')

@section('content')

<div class="panel-body">
    <div class="row">
        <div class="col-sm-11">
          <h3>Edit User</h3>
        </div>
        <div class="col-sm-1 pull-right">
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
 </div>

 @include('FlashMessage')


<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body form-group form-group-sm">
				<form method="post" id="add_product" action="{{ route('user.store') }}">
                    @csrf
					<input type="hidden" name="action" value="add_product">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
					@include('admin.fields')
                    <div class="row">
						<div class="col-xs-12 margin-top btn-group">
							<input type="submit" id1="action_create_customer" class="btn btn-success float-right" value="Update User" data-loading-text="Creating...">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<div>

@endsection
