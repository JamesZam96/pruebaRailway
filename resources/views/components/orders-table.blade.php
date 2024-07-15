<div class="row my-2">
    <h3 class="fs-4 mb-3">Ordenes</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">Id</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Servicio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->date }}</td>
                        <td>{{ $order->name_customer }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->product ? $order->product->name : '' }}</td>
                        <td>{{ $order->service ? $order->service->name : '' }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>