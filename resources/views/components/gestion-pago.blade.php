<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/gestion-pago.css') }}">
</head>
<body>
    <main >
      <section class="d-flex justify-content-evenly p-5">
        <div class="w-25">
            <strong><p>Dirección de entrega</p></strong>
            <input class="bg-dark text-light rounded-2" type="text"   >
            <strong><p>Instrucciones de entrega</p></strong>
            <input class="bg-dark text-light rounded" type="text" ><br>
            <strong><span>Entrega estimada:</span> <span class="mx-5"> fecha</span></strong>
            <div class="form-check">
                <input class="form-check-input bg-black " type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Prioritaria
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input bg-black" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                  Básica
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input bg-black" type="radio" name="flexRadioDefault" id="flexRadioDefault3" >
                <label class="form-check-label" for="flexRadioDefault3">
                  Económica
                </label>
              </div>
        </div>
          <div class=" caja-resumen bg-black rounded-2 p-2 w-25">
              <div class="container row d-flex align-items-center">
                <h2 class="text-danger col-12">Resumen</h2>
                <p class="text-light col-10">Costo de productos  </p><p class="text-light col-2">$0</p>
                <p class="text-light col-10">Tarifa de servicio   </p><p class="text-light col-2">$0</p>
                <p class="text-light col-10">Costo de envio  </p><p class="text-light col-2">$0</p>
                <p class="text-light col-10">Propina  </p><p class="text-light col-2">$0</p>
                <p class="text-light col-10">Total  </p><p class="text-light col-2">$0</p>
                <button type="button" class="btn btn-danger text-black mx-2" data-bs-toggle="modal" data-bs-target="#modalPedidoConfirmado"><strong>Hacer Pedido</strong><x-modal-pago /></button>
              </div>
            </div>
      </section>
      
      <section class="d-flex justify-content-center m-4">
              <div class="bg-black text-light w-50 p-4">
                <div class="d-flex justify-content-between p-2">
                  <p>Método de pago: </p>
                  <button type="button" class="btn btn-light w-50 text-start"><img width="25px" src="{{asset('icons/efectivo.png')}}" alt="icono efectivo">Efectivo</button>
                </div>
                <div class="d-flex justify-content-between p-2">
                  <p>Agregar método de pago: </p>
                  <button type="button" class="btn btn-light w-50 text-start" data-bs-toggle="modal" data-bs-target="#modalPago"><img width="25px" src="{{asset('icons/tarjeta.png')}}" alt="icono tarjeta de pago">Agregar tarjeta debito credito<x-modal-pago /> </button>
                </div>
                <div class=" p-2 text-center">
                  <p>Añade una propina: </p>
                  <p>!Las entregar no serían posbiles sin ellos¡ </p>
                  <button class="btn btn-light rounded-2">$1000</button>
                  <button class="btn btn-light rounded-2">$2000</button>
                  <button class="btn btn-light rounded-2">$3000</button>
                  <button class="btn btn-light rounded-2">$4000</button>
                </div>

              </div>
        </section>
    </main>
</body>
</html>