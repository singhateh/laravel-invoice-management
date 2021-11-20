@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <h3>Customers List</h3>
        </div>
        <div class="col-sm-3 pull-right">
            <a href="#" class="btn btn-primary btn-sm openCreateModal">Add Customer</a>
            <a href="{{ route('customers.index', ['pdf' => 'pdf']) }}" class="btn btn-danger btn-sm">PDF</a>
            <a href="{{ route('export.customers') }}" class="btn btn-success btn-sm">Export</a>
        </div>
    </div>
    @include('FlashMessage')
    <div class="panel">
        <div id="ContainerTable" data-url="{{ route('customers.index') }}">
            <div class="panel-body">
                @include('customers.table')
            </div>
        </div>

        <form method="post" id="CurrentForm" action="{{ route('customers.store') }}">
            @csrf
            @include('customers.modal')
        </form>
    @endsection
