@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-8">
              <h3>Customers List</h3>
            </div>
            <div class="col-sm-4 pull-right">
                <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">Add Customer</a>
                <a href="" class="btn btn-danger btn-sm">PDF</a>
                <a href="" class="btn btn-success btn-sm">Export</a>
                <a href="" class="btn btn-info btn-sm">IMPORT</a>
            </div>
        </div>
     </div>
   <div class="panel">
       <div class="panel-body">
        @include('customers.table')
       </div>
   </div>
@endsection
