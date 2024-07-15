<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Producto Servicio Ingreso</title>
</head>
<body>
    <x-navbar-session />
    <br>
    <x-round-icon icon="{{ asset('icons/llave-inglesa.png') }}" text="Productos disponibles"></x-round-icon>
    <br>
    <x-product-card :products="$products"/>
    <br>
    <x-round-icon icon="{{ asset('icons/llave-inglesa.png') }}" text="Servicios disponibles"></x-round-icon>
    <br>
    <x-servicio-card :services="$services"/>
    <br>
    <x-google-map :api-key="config('services.google.maps_api_key')" />
    <br>
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>