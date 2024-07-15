<a class="btn btn-success" href="/products/create" role="button">Nuevo producto <i class="fa-solid fa-plus"></i></a>
<div class="row my-2">
    <h3 class="fs-4 mb-3">Productos</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <a href="{{route('products.show', $product)}}" class="btn btn-info btn-sm">
                                <span class="d-none d-sm-inline">Ver</span>
                                <i class="fa-regular fa-eye"></i>
                            </a>
                            <a href="{{route('products.edit', $product)}}" class="btn btn-dark btn-sm">
                                <span class="d-none d-sm-inline">Editar</span>
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form action="{{route('products.destroy', $product)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <span class="d-none d-sm-inline">Eliminar</span>
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>