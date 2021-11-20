@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>Products List</h3>
        </div>
        <div class="col-xs-3 pull-right">
            <a href="#" class="btn btn-primary btn-sm openCreateModal">Add Product</a>
            <a href="{{ route('products.index', ['pdf' => 'pdf']) }}" class="btn btn-danger btn-sm">PDF</a>
            <a href="{{ route('export.products') }}" class="btn btn-success btn-sm">Export</a>
        </div>
    </div>

    @include('FlashMessage')

    <div class="panel">
        <div id="ContainerTable" data-url="{{ route('products.index') }}">
            <div class="panel-body">
                @include('products.table')
            </div>
        </div>
    </div>

    <form method="post" id="CurrentForm" action="{{ route('products.store') }}">
        @csrf
        @include('products.modal')
    </form>


@endsection
