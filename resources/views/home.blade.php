@extends('layouts.app')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            <h3>{{ $totalInvoices }}</h3>

            <p>Total Invoices</p>
          </div>
          <div class="icon">
            <i class="ion ion-printer"></i>
          </div>

        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-olive">
          <div class="inner">
          <h3>{{ $totalPaidBill }}</h3>

            <p>Paid Invoice Billis</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-paper"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
          <h3>{{ $totalPendingBill }}</h3>

            <p>Pending Invoice Bills</p>
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
          <h3>{{ $totalDueBill }}</h3>

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
            <div class="small-box bg-green">
              <div class="inner">
                <h3>
                    {{ $totalAmount }}
                </h3>

                <p>Total Sales Amount</p>
              </div>
              <div class="icon">
                <i class="ion ion-social-usd"></i>
              </div>

            </div>
          </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ $totalProducts }}</h3>

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
            <h3>{{ $totalCustomers }}</h3>

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
          <h3>{{ $totalUsers }}</h3>

            <p>Total Users</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>

        </div>
      </div>
    </div>





@endsection
