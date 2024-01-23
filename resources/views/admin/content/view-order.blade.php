<div>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Order ID</th>
                <th>Order total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
