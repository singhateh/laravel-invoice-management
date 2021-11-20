@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <h3>Users List</h3>
        </div>
        <div class="col-sm-3 pull-right">
            <a href="#" class="btn btn-primary btn-sm openCreateModal">Add User</a>
            <a href="{{ route('user.index', ['pdf' => 'pdf']) }}" class="btn btn-danger btn-sm">PDF</a>
            <a href="{{ route('export.users') }}" class="btn btn-success btn-sm">Export</a>
        </div>
    </div>

    @include('FlashMessage')

    <div class="panel">
        <div id="ContainerTable" data-url="{{ route('user.index') }}">
            <div class="panel-body">
                @include('admin.table')
            </div>
        </div>
    </div>



    <form method="post" id="CurrentForm" action="{{ route('user.store') }}">
        @csrf
        @include('admin.modal')
    </form>

@endsection
