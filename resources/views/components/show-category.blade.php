<a class="btn btn-success" href="{{route('categories.edit',$category)}}" role="button">Editar categoría <i class="fa-solid fa-plus"></i></a>
<div class="row my-2">
    <h3 class="fs-4 mb-3">Detalles de la categoría</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">Campo</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nombre: </td>
                    <td>{{$category->name}}</td>
                </tr>
                <tr>
                    <td>Descripción: </td>
                    <td>{{$category->description}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>