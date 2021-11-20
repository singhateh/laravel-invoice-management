@extends('layouts.app')

@section('content')

<div class="panel-body">
    <div class="row">
        <div class="col-sm-10">
          <h3>Create User</h3>
        </div>
        <div class="col-sm-2 pull-right">
            <a href="" class="btn btn-info btn-sm">IMPORT</a>
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
 </div>
 
 @include('FlashMessage')


<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">

			<div class="panel-body form-group form-group-sm">
				<form method="post" id="add_user" action="{{ route('user.store') }}">
                    @csrf
					<input type="hidden" name="action" value="add_user">
					@include('admin.fields')
				</form>
			</div>
		</div>
	</div>
<div>

@endsection

