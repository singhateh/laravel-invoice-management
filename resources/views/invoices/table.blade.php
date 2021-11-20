<table class="table table-striped table-hover table-bordered" id="data-table" cellspacing="0">
    <thead>
        <tr>
            <th>SN</th>
            <th>Invoice Number</th>
            <th>Customer</th>
            <th>Issue Date</th>
            <th>Due Date</th>
            <th>Type</th>
            <th>Status</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody id="tableIndex">
        @include('invoices.tableContent')
    </tbody>
</table>
