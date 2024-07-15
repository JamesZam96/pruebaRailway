<h3 class="fs-4 mb-3">Editar categoría</h3>
<form action="{{route('categories.update', $category)}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row g-3">
        <div class="col">
            <label for="name" class="form-label fw-semibold mb-1">Nombre</label>
            <input type="text" class="form-control border border-black border-1 focus-ring" 
            style="--bs-focus-ring-color: rgba(250, 61, 59, 0.25)" 
            placeholder="Nombre" aria-label="name" name="name" id="name" 
            required value="{{old('name', $category->name)}}">
        </div>
        <div class="col">
            <label for="description" class="form-label fw-semibold mb-1">Descripción</label>
            <input type="text" class="form-control border border-black border-1 focus-ring" 
            style="--bs-focus-ring-color: rgba(250, 61, 59, 0.25)" 
            placeholder="Descripción" aria-label="description" name="description" id="description" 
            required value="{{old('description', $category->description)}}">
        </div>
    </div>
    <button type="submit" class="btn btn-success mt-4">Guardar</button>
</form>