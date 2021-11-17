
<table class="table table-striped table-hover table-bordered" id="data-table" cellspacing="0">
    <thead>
        <tr>
            <th>Invoice</th>
            <th>Customer</th>
            <th>Issue Date</th>
            <th>Due Date</th>
            <th>Type</th>
            <th>Status</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>

        <tr>
            <td>'.$row["invoice"].'</td>
            <td>'.$row["name"].'</td>
            <td>'.$row["invoice_date"].'</td>
            <td>'.$row["invoice_due_date"].'</td>
            <td>'.$row["invoice_type"].'</td>


            {{-- <td><span class="label label-primary"></span></td> --}}

            <td><span class="label label-success"></span></td>

            <td><a href="invoice-edit.php?id=#" class="btn btn-primary btn-xs"><span
                        class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                        <a href="#"
                    data-invoice-id="#" data-email="#"
                    data-invoice-type="'.$row['invoice_type'].'" data-custom-email="#"
                    class="btn btn-success btn-xs email-invoice"><span class="glyphicon glyphicon-envelope"
                        aria-hidden="true"></span></a> <a href="#"
                    class="btn btn-info btn-xs" target="_blank"><span class="glyphicon glyphicon-download-alt"
                        aria-hidden="true"></span></a> <a data-invoice-id="#"
                    class="btn btn-danger btn-xs delete-invoice"><span class="glyphicon glyphicon-trash"
                        aria-hidden="true"></span></a></td>
        </tr>

        </tr>
    </tbody>
</table>
