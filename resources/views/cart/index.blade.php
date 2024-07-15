<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        
        .cart-container {
            background-color: #212529;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 800px;
            margin: 0 auto;
        }
        .cart-container h1 {
            color: #fff;
        }
        .cart-container .table {
            color: #fff;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #bb2d3b;
            border-color: #b02a37;
        }
    </style>
</head>
<body>

    <x-navbar-session />
    <br>
    <div class="container cart-container">
        <h1 class="text-center mb-4">Tu carrito de compras</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-4">
            <form action="{{route('confirm.order')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="date" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="date" id="date">
                </div>
                <div class="mb-3">
                    <label for="name_customer" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name_customer" id="name_customer" value="{{Auth::user()->name}}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="address" id="address">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{Auth::user()->phone}}">
                </div>
                <button type="submit" class="btn btn-danger">Hacer pedido</button>
                <a class="btn btn-danger" href="/ProductosyServicios">Agregar más productos o servicios</a>
            </form>
            
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>
                            {{ $item->product ? $item->product->name : $item->service->name }}
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->product ? $item->product->price : $item->service->price }}</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
