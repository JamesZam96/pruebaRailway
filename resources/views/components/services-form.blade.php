<h3 class="fs-4 mb-3">Nuevo servicio</h3>
<form action="{{route('services.store')}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="row g-3 mb-5">
        <div class="col">
            <label for="name" class="form-label fw-semibold mb-1">Nombre</label>
            <input type="text" class="form-control border border-black border-1 focus-ring" style="--bs-focus-ring-color: rgba(250, 61, 59, 0.25)" placeholder="Nombre" aria-label="name" name="name" id="name" required>
        </div>
        <div class="col">
            <label for="description" class="form-label fw-semibold mb-1">Descripción</label>
            <input type="text" class="form-control border border-black border-1 focus-ring" style="--bs-focus-ring-color: rgba(250, 61, 59, 0.25)" placeholder="Descripción" aria-label="description" name="description" id="description" required>
        </div>
    </div>
    <div class="row g-3 mb-5">
        <div class="col">
            <label class="form-label fw-semibold mb-1" for="price">Precio</label>
            <div class="input-group">
                <div class="input-group-text border border-black border-1">$</div>
                <input type="number" class="form-control border border-black border-1 focus-ring" style="--bs-focus-ring-color: rgba(250, 61, 59, 0.25)" id="price" placeholder="Precio" aria-label="price" name="price" required>
            </div>
        </div>
        <div class="col">
            <label for="image" class="form-label fw-semibold mb-1">Imagen</label>
            <input type="file" class="form-control border border-black border-1 focus-ring" style="--bs-focus-ring-color: rgba(250, 61, 59, 0.25)" placeholder="Imagen" aria-label="image" name="image" id="image" required>
        </div>
    </div>
    <div class="row g-3">
        <div class="col">
            <label for="category_id" class="form-label fw-semibold mb-1">Categoría</label>
            <select name="category_id" class="form-select border border-black border-1 focus-ring" style="--bs-focus-ring-color: rgba(250, 61, 59, 0.25)" id="category_id" required>
                <option hidden>Selecciona una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-success mt-4">Guardar</button>
</form>