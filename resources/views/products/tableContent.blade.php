

@forelse ($products as $key => $product)
<tr>
    <td>{{ $key + 1 }}</td>
    <td>{{ $product->product_name .''. $product->id }}</td>
    <td>{{ $product->product_qty }}</td>
    <td>{{ $product->product_price }}</td>
    <td>{{ $product->product_desc }}</td>

    <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-xs"><span
                class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        </a>

        <a href="javascript:void(0)" data-toggle1="modal" data-target="#delete{{ $key }}"
                    onclick=" Confirm('Confirm', 'Are you sure you want to delete this?', 'Yes', 'Cancel', {{ $product->id }})"
                    data-singleDelete="{{ route('products.destroy', $product->id) }}"
                    class="btn btn-danger btn-xs delete-invoice singleDelete{{ $product->id }}">
                    <i class="fa fa-trash m-r-5"></i>
                </a>
    </td>
</tr>
@empty

@endforelse
