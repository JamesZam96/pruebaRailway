<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>inicio</title>
</head>
<body>
    <x-navbar-session />
    <br>
    <x-round-icon icon="{{ asset('icons/llave-inglesa.png') }}" text="Talleres cerca de ti"></x-round-icon>
    <br>
    <x-carousel />
    <br>
    <x-round-icon icon="{{ asset('icons/llave-inglesa.png') }}" text="Almacenes cerca de ti"></x-round-icon>
    <br>
    <x-carusel-almacen-component />
    <br>
    <x-round-icon icon="{{ asset('icons/llave-inglesa.png') }}" text="Los más elegidos"></x-round-icon>
    <br>
    <x-round-link />
    <br>
    <x-round-icon icon="{{ asset('icons/llave-inglesa.png') }}" text="Los  más buscados"></x-round-icon>
    <br>
    <x-image-circle />
    <br>
    <x-join-garapp />
    <br>
    <x-image-infomation />
    <br>
    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>