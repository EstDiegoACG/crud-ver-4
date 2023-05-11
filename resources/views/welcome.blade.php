<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jugetes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/09817cde79.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <h1 class="text-center p-3">JUGUETERIA EL JUGADOR</h1>

    <script>
        var res = function () {
            var not = confirm("Seguro que desea eliminar?");
            return not;
        }
    </script>

    <!-- Modal de registro datos -->
    <div class="modal fade" id="ModalRegistrar" tabindex="-1" aria-labelledby="ModalRegistrar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalRegistrar">Registrar juguete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("crud.create")}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre Producto</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtNombre">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Precio Producto</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtPrecio">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad Producto</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCantidad">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-5 table-responsive">
        <button class="btn btn-info" data-bs-toggle= "modal" data-bs-target="#ModalRegistrar">Registrar Producto</button>
        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">CANTIDAD</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Recepcionamos la variable datos para mostrar los datos xd, de la base -->
                @foreach ($datos as $item)
                    <tr>
                        <th scope="row">{{$item -> id}}</th>
                        <td>{{$item -> nombre}}</td>
                        <td>${{$item -> precio}}MXN</td>
                        <td>{{$item -> cantidad}}</td>
                        <td>
                            <a href="" data-bs-toggle= "modal" data-bs-target="#ModalEditar{{$item -> id}}" class="btn btn-dark btn-sm"><i class="fa-solid fa-pen"></i></a>
                            <a href="{{route("crud.delete",$item -> id)}}" onclick="return res()" class="btn btn-dark btn-sm"><i class="fa-solid fa-delete-left"></i></a>
                        </td>

                            <!-- Modal de modificar datos -->
                                <div class="modal fade" id="ModalEditar{{$item -> id}}" tabindex="-1" aria-labelledby="ModalEditar" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ModalEditar">EDITAR DATOS</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route("crud.update")}}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">ID Producto</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcodigo" value="{{$item -> id}}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nombre Producto</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtNombre" value="{{$item -> nombre}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Precio Producto</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtPrecio" value="{{$item -> precio}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Cantidad Producto</label>
                                                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCantidad" value="{{$item -> cantidad}}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    </tr> 
                @endforeach
                
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>