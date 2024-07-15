@php
$card = 
    [
        'image' => asset('img/producto1.jfif'),
        'title' => 'liquido',
        'description' => '35.000$',
    ]
   
@endphp
                           
                           <button type="button" style="display: none; class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPago">
                                Agregar
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalPago" tabindex="-1" aria-labelledby="modalPagoLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content text-black">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalPagoLabel">Agregar metodo de pago</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex flex-column align-items-center gap-3">
                                        
                                        <img width="55px" src="{{asset('icons/tarjeta.png')}}" alt="icono tarjeta de pago">
                                        <div class="mb-3 d-flex flex-column gap-3 w-50">
                                            <input type="text" class="form-control text-white  placeholder-secondary" id="exampleFormControlInput1" placeholder="Nombre">
                                            <input type="text" maxlength="16" class="form-control " id="exampleFormControlInput1" placeholder="Numero Tarjeta">

                                          </div>
                                          <div class="mb-3 d-flex  gap-3 w-50">
                                            <input type="text" minlength="4" maxlength="4" class="form-control" id="exampleFormControlInput1" placeholder="Año">
                                            <input type="text" minlength="2" maxlength="2" class="form-control" id="exampleFormControlInput1" placeholder="Mes">
                                            <input type="text" minlength="3" maxlength="3" class="form-control" id="exampleFormControlInput1" placeholder="Cvv">


                                          </div>

                                    </div>
                                    <div class="modal-footer d-flex flex-column">
                                    <button type="button" style="display: none;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary bg-dark">Confirmar pago</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>


                            <!-- Modal hacer pago -->

                            <button type="button" style="display: none;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPedidoConfirmado">
                                Agregar
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalPedidoConfirmado" tabindex="-1" aria-labelledby="modalPedidoConfirmadoLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content text-black">
                                    <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex flex-column align-items-center gap-3">
                                        
                                        <img src="{{ $card['image'] }}" class="card-img-top" alt="{{ $card['title'] }}">
                                        <div class="card-body bg-dark p-2">
                                            <h6 class="card-title mb-1 text-danger">{{ $card['title'] }}</h6>
                                            <p class="card-text small mb-2 text-white">{{ $card['description'] }}</p>
                            
                                    </div>
                                    <div class="modal-footer d-flex flex-column">
                                    <button type="button" style="display: none;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary bg-dark">Compra exitosa</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            



