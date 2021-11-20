<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use PDF;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->setting = Setting::first();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['view' =>view('products.tableContent', ['products' => Product::get()])->render()]);
        }

        if ($request->pdf) {
            $pdf = PDF::loadView('pdf.products', ['products' => Product::get(), 'setting' => $this->setting]);
            return $pdf->download('products_list.pdf');
        }

        return view('products.index', ['products' => Product::get(), 'setting' => $this->setting]);
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        Product::updateOrCreate(['id' => $request->product_id], [
            'product_name' => $request->product_name,
            'product_qty' => $request->product_qty,
            'product_price' => $request->product_price,
            'product_desc' => $request->product_desc,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => $request->product_id ? 'Product Updated successfully' : 'Product Created successfully', 'status' => 'Status 200 ']);
        }else {
            return redirect()->route('products.index')->with('success', $request->product_id ? 'Product Updated successfully' : 'Product Created successfully');
        }
    }


    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product, 'setting' => $this->setting]);
    }

    public function destroy(Product $product, Request $request)
    {
        if (!Hash::check($request->password, auth()->user()->password)) {
            return response()->json(['not_valid' => 'Password not valid']);
        }
        try {
            $product->delete();
            return response()->json(['success' => 'Product Deleted Successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Product Not Deleted Fail']);
        }
    }


    public function export()
    {
        try {
            return Excel::download(new ProductExport, 'products_list.xlsx');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
