@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <h3>System Settings</h3>
        </div>
    </div>
    @include('FlashMessage')
    <div class="panel">
        <div class="panel-body">
            <form method="post" id="CurrentForm1" action="{{ route('setting.store') }}">
                @csrf
                @include('settings.fields')

                <div class="modal-footer">
                    <button type="submit"  class="btn btn-success">Save Settings</button>
                </div>
            </form>
        </div>
    @endsection
