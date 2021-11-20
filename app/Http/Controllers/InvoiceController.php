<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;


class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->setting = Setting::first();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['view' => view('invoices.tableContent', ['invoices' => Invoice::with('customer')->orderByDesc('id')->get()])->render()]);
        }
        return view(
            'invoices.index',
            [
                'products' => Product::get(['id', 'product_name', 'product_qty', 'product_price']),
                'invoices' => Invoice::with('customer')->orderByDesc('id')->get(),
                'customers' => Customer::get(), 'setting' => $this->setting
            ]
        );
    }

    public function create()
    {
        return view('invoices.create', ['products' => Product::get(['id', 'product_name', 'product_qty', 'product_price']), 'customers' => Customer::get(), 'setting' => $this->setting]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        try {

            DB::beginTransaction();

            $invoice = Invoice::updateOrCreate(
                ['id' => $request->invoice_id],
                [
                    'invoice_type' =>  $request->invoice_type,
                    'status' =>  $request->invoice_status,
                    'invoice_date' =>  date('Y-m-d H:i', strtotime($request->invoice_date)),
                    'invoice_due_date' => date('Y-m-d H:i', strtotime($request->invoice_due_date)),
                    'email' => $request->custom_email ?? $request->email,
                    'subtotal' =>  $request->invoice_subtotal ?? 0,
                    'shipping' =>  $request->shipping_charges ?? 0,
                    'discount' =>  $request->invoice_discount ?? 0,
                    'vat' =>  $request->invoice_vat ?? 0,
                    'total' =>  $request->invoice_total ?? 0,
                    'notes' =>  $request->invoice_notes ?? null,

                ]
            );

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

            foreach ($request->invoice_product as $key => $value) {

                InvoiceDetail::updateOrCreate(
                    ['id' => $request->invoice_detail_id[$key] ?? ''],
                    [
                        'invoice_id' =>   $invoice->id,
                        'product_id' =>  $request->product_id[$key],
                        'qty' =>  $request->invoice_product_qty[$key] ?? 1,
                        'price' =>  $request->invoice_product_price[$key] ?? 0,
                        'discount' => $request->invoice_product_discount[$key] ?? 0,
                        'subtotal' =>  $request->invoice_product_sub[$key] ?? 0,
                    ]
                );

                Product::where('id', $request->product_id[$key])
                    ->decrement('product_qty', $request['invoice_product_qty'][$key]);
            }

            if ($request->invoice_id_test == '') {
                $this->setting->update(['invoice_initial_value' => $request->invoice_id + 1]);
            }

            DB::commit();
            return response()->json(['success' => $request->invoice_id_test ? 'Invoice Updated successfully' : 'Invoice Created successfully', 'invoice_id' => $request->invoice_id_test, 'option' => $request->option, 'printInvoiceId' =>  $invoice->id]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => 'Opps!! something whent wrong please check your inputs!', 'status' => 'Status 500 ']);
        }
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', ['invoice' => $invoice->load(['customer', 'invoiceDetails', 'invoiceDetails.product']), 'products' => Product::get(['id', 'product_name', 'product_qty', 'product_price']), 'customers' => Customer::get(), 'setting' => $this->setting]);
    }


    public function show(Request $request, Invoice $invoice)
    {
        $pdf = PDF::loadView('pdf.index', compact('invoice'), ['invoice' => $invoice->load(['customer', 'invoiceDetails', 'invoiceDetails.product']), 'setting' => $this->setting]);

        if ($request->option == 'download') {
            return $pdf->download('invoice.pdf');
        } elseif ($request->option == 'preview') {
            return $pdf->stream();
        }else {
            return $pdf->download('invoice.pdf');
        }
    }


    public function destroy(Invoice $invoice, Request $request)
    {
        if (!Hash::check($request->password, auth()->user()->password)) {
            return response()->json(['not_valid' => 'Password not valid']);
        }
        try {
            $invoice->delete();
            return response()->json(['success' => 'Invoice Deleted Successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Invoice Not Deleted Fail']);
        }
    }
}
