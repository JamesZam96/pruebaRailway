<a class="btn btn-success" href="{{route('products.edit',$product)}}" role="button">Editar producto <i class="fa-solid fa-plus"></i></a>
<div class="row my-2">
    <h3 class="fs-4 mb-3">Detalles del producto</h3>
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
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <td>Descripción: </td>
                    <td>{{$product->description}}</td>
                </tr>
                <tr>
                    <td>Precio: </td>
                    <td>{{$product->price}}</td>
                </tr>
                <tr>
                    <td>Cantidad: </td>
                    <td>{{$product->quantity}}</td>
                </tr>
                <tr>
                    <td>Imagen: </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Categoría: </td>
                    <td>{{$product->category->name}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>