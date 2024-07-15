<!-- Button trigger modal -->
<button type="button" style="display: none; class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCancelarPedido">
    Launch static backdrop modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modalCancelarPedido" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCancelarPedidoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalCancelarPedidoLabel">Cancelar Pedido</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estás seguto de cancelar el pedido?
        </div>
        <div class="modal-footer d-flex justify-content-around">
          <button type="button" class="btn btn-dark">Si, cancelar pedido</button>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">No, continuar con el pedido</button>
        </div>
      </div>
    </div>
  </div>