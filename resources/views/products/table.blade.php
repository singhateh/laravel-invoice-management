
<table class="table table-striped table-hover table-bordered" id="data-table" cellspacing="0">
    <thead>
        <tr>
            <th>SN</th>
            <th>Product Name</th>
            <th>Product Qty</th>
            <th>Product Price</th>
            <th>Product Desc</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>

        @forelse ($products as $key => $product)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_qty }}</td>
            <td>{{ $product->product_price }}</td>
            <td>{{ $product->product_desc }}</td>

            <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-xs"><span
                        class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                        <a href="#"
                    data-invoice-id="#" data-email="#"
                    data-invoice-type="'.$row['invoice_type'].'" data-custom-email="#"
                    class="btn btn-success btn-xs email-invoice"><span class="glyphicon glyphicon-envelope"
                        aria-hidden="true"></span>
                    </a> <a href="#"
                    class="btn btn-info btn-xs" target="_blank"><span class="glyphicon glyphicon-download-alt"
                        aria-hidden="true"></span></a>
                         <a data-invoice-id="#"
                    class="btn btn-danger btn-xs delete-invoice"><span class="glyphicon glyphicon-trash"
                        aria-hidden="true"></span></a></td>
        </tr>
        @empty
        {{-- <tr>
            <td colspan="12">No Data Found</td>
        </tr> --}}
        @endforelse
    </tbody>
</table>
