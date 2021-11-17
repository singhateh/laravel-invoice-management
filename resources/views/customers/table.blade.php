<table class="table table-striped table-hover table-bordered" id="data-table" cellspacing="0">
    <thead>
        <tr>
            <th>SN</th>
            <th> Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>

        @forelse ($customers as $key => $customer)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->country }}</td>

                <td><a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-xs"><span
                            class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>

                    <a data-invoice-id="#" class="btn btn-danger btn-xs delete-invoice"><span
                            class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        @empty
            {{-- <tr>
                <td colspan="12">No Data Found</td>
            </tr> --}}
        @endforelse
    </tbody>
</table>
