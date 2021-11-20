@forelse ($customers as $key => $customer)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->phone }}</td>
        @if (!Request::is('invoices*'))
            <td>{{ $customer->country }}</td>
        @endif
        <td>
            @if (Request::is('invoices*'))
                @include('invoices.select_customer')
            @else
                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-xs"><span
                        class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>

                <a href="javascript:void(0)" data-toggle1="modal" data-target="#delete{{ $key }}"
                    onclick=" Confirm('Confirm', 'Are you sure you want to delete this?', 'Yes', 'Cancel', {{ $customer->id }})"
                    data-singleDelete="{{ route('customers.destroy', $customer->id) }}"
                    class="btn btn-danger btn-xs delete-invoice singleDelete{{ $customer->id }}">
                    <i class="fa fa-trash m-r-5"></i>
                </a>
            @endif
        </td>
    </tr>
@empty

@endforelse
