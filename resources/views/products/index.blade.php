@extends('layouts.app')

@section('content')
<div class="panel-body">
    <div class="row">
        <div class="col-sm-9">
          <h3>Products List</h3>
        </div>
        <div class="col-sm-3 pull-right">
            <a href="" class="btn btn-danger btn-sm">PDF</a>
            <a href="" class="btn btn-success btn-sm">Export</a>
            <a href="" class="btn btn-info btn-sm">IMPORT</a>
        </div>
    </div>
 </div>
   <div class="panel">
       <div class="panel-body">
        @include('products.table')
       </div>
   </div>
@endsection
