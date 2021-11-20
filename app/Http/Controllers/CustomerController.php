<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use PDF;
use App\Models\Setting;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->setting = Setting::first();
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['view' =>view('customers.tableContent', ['customers' => Customer::get()])->render()]);
        }

        if ($request->pdf) {
            $pdf = PDF::loadView('pdf.customers', ['customers' => Customer::get(), 'setting' => $this->setting]);
            return $pdf->download('customers_list.pdf');
        }
        return view('customers.index', ['customers' => Customer::get()]);
    }


    public function create()
    {
        return view('customers.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        Customer::updateOrCreate(['id' => $request->customer_id], [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address_1' => $request->address_1,
            'city' => $request->city,
            'post_code' => $request->postcode,
            'address_2' => $request->address_2,
            'country' => $request->country,

            'ship_name' => $request->ship_name,
            'ship_email' => $request->ship_email,
            'ship_phone' => $request->ship_phone,
            'ship_address_1' => $request->ship_address_1,
            'ship_city' => $request->ship_city,
            'ship_post_code' => $request->ship_postcode,
            'ship_address_2' => $request->ship_address_2,
            'ship_country' => $request->ship_country,

        ]);

        if ($request->ajax()) {
            return response()->json(['success' => $request->customer_id ? 'Customer Updated successfully' : 'Customer Created successfully', 'status' => 'Status 200 ']);
        }else {
            return redirect()->route('customers.index')->with('success', $request->customer_id ? 'Customer Updated successfully' : 'Customer Created successfully');
        }

    }


    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
    }


    public function show(Customer $customer)
    {
        $pdf = PDF::loadView('pdf.customers', ['customer' => $customer, 'setting' => $this->setting]);
        return $pdf->download('invoice.pdf');
    }


    public function destroy(Customer $customer, Request $request)
    {
        if (!Hash::check($request->password, auth()->user()->password)) {
            return response()->json(['not_valid' => 'Password not valid']);
        }
        try {
            $customer->delete();
            return response()->json(['success' => 'Customer Deleted Successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Customer Not Deleted Fail']);
        }
    }

    public function export()
    {
        try {
            return Excel::download(new CustomerExport, 'customers_list.xlsx');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
