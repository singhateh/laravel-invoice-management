<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home',
    ['totalProducts' => Product::count(),
    'totalUsers' => User::count(),
    'totalCustomers' => Customer::count(),
    'totalInvoices' => Invoice::count(),
    'totalPaidBill' => Invoice::where('status', 'paid')->count(),
    'totalPendingBill' => Invoice::where('status', 'open')->count(),
    'totalDueBill' => Invoice::whereDate('invoice_due_date', '<', now())->count(),
    'totalAmount' => Invoice::sum('subtotal')]
    );
    }
}
