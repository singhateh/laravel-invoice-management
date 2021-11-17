@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}




    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>
                connection
            </h3>

            <p>Sales Amount</p>
          </div>
          <div class="icon">
            <i class="ion ion-social-usd"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            <h3>70</h3>

            <p>Total Invoices</p>
          </div>
          <div class="icon">
            <i class="ion ion-printer"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
          <h3>60</h3>

            <p>Pending Bills</p>
          </div>
          <div class="icon">
            <i class="ion ion-load-a"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
          <h3>7</h3>

            <p>Due Amount</p>
          </div>
          <div class="icon">
            <i class="ion ion-alert-circled"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->


    <!-- 2nd row -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>200</h3>

            <p>Total Products</p>
          </div>
          <div class="icon">
            <i class="ion ion-social-dropbox"></i>
          </div>

        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3>100</h3>

            <p>Total Customers</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people"></i>
          </div>

        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-olive">
          <div class="inner">
          <h3>4000</h3>

            <p>Paid Bills</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-paper"></i>
          </div>

        </div>
      </div>
    </div>





@endsection
