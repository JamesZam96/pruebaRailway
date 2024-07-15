<a class="btn btn-success" href="/categories/create" role="button">Nueva categoría <i class="fa-solid fa-plus"></i></a>
<div class="row my-2">
    <h3 class="fs-4 mb-3">Categorías</h3>
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
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{route('categories.show', $category)}}" class="btn btn-info btn-sm">
                                <span class="d-none d-sm-inline">Ver</span>
                                <i class="fa-regular fa-eye"></i>
                            </a>
                            <a href="{{route('categories.edit', $category)}}" class="btn btn-dark btn-sm">
                                <span class="d-none d-sm-inline">Editar</span>
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form action="{{route('categories.destroy', $category)}}" method="POST" style="display:inline;">
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