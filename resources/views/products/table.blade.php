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
    <tbody id="tableIndex">
        @include('products.tableContent')
    </tbody>
</table>
