<table class="table table-striped table-hover table-bordered" id="data-table" cellspacing="0">
    <thead>
        <tr>
            <th>SN</th>
            <th> Name</th>
            <th>Email</th>
            <th>Phone</th>
            @if (!Request::is('invoices*'))
            <th>Country</th>
            @endif
            <th>Actions</th>

        </tr>
    </thead>
    <tbody id="tableIndex">
        @include('customers.tableContent')
    </tbody>
</table>
