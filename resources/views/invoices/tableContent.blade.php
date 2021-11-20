@foreach ($invoices as $key => $invoice)

<tr>
    <td>{{ $key + 1 }}</td>
    <td>{{ $invoice->id }}</td>
    <td>{{ $invoice->customer->name }}</td>
    <td>{{ $invoice->invoice_date }}</td>
    <td>{{ $invoice->invoice_due_date }}</td>
    <td>{{ $invoice->invoice_type }}</td>
    <td><span
            class="label {{ $invoice->status == 'paid' ? 'label-success' : 'label-danger' }}">{{ $invoice->status == 1 ? 'Paid' : 'Open' }}</span>
    </td>
    <td>
        <a href="{{ route('invoices.edit', $invoice->id) }}"  class="btn btn-primary btn-xs"><span
                class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        </a>

         <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info btn-xs" target="_blank"><span
                class="fa fa-file-pdf-o" aria-hidden="true"></span>
        </a>

        <a href="javascript:void(0)" data-toggle1="modal" data-target="#delete{{ $key }}"
        onclick=" Confirm('Confirm', 'Are you sure you want to delete this?', 'Yes', 'Cancel', {{ $invoice->id }})"
        data-singleDelete="{{ route('invoices.destroy', $invoice->id) }}"
        class="btn btn-danger btn-xs delete-invoice singleDelete{{ $invoice->id }}">
        <i class="fa fa-trash m-r-5"></i>
            </a>
    </td>
</tr>
@endforeach
