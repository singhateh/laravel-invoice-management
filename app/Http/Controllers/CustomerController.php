<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
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

        return response()->json(['message' => $request->id ? 'Customer Updated successfully' : 'Customer Created successfully', 'status' => 'Status 200 ']);
    }


    public function show(Customer $customer)
    {
        //
    }


    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
