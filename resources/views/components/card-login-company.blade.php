<div class="text-center my-2">
        <h1 class="text-black">Inicia sesión</h1>
    </div>
<div class="d-flex justify-content-center">
    <div class="card w-75 my-3 rounded-2 border border-0">
        <div class="card-body d-flex flex-row p-0">
            <div class="p-2 w-50 rounded-start-2" style="background-color:rgba(250, 61, 59, 0.7);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                        <h2 class="text-center my-3 text-black">Bienvenido</h2>
                        </div>
                        <div class="col-md-8 text-center">
                            <h1 class="text-white">GARAPP</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 w-50 rounded-end-2">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2 class="text-center my-3 text-black">Accede a tu cuenta</h2>
                            <form method="POST" action="{{ route('login.company') }}">
                                @csrf
                                <div class="form-group my-3">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" id="email" name="email" class="form-control border border-black border-1 focus-ring" style="--bs-focus-ring-color: rgba(250, 61, 59, 0.25)" required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="password">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control border border-black border-1 focus-ring" style="--bs-focus-ring-color: rgba(250, 61, 59, 0.25)" required>
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-dark btn-block my-3 w-50 bg-black">Iniciar sesión</button>
                                </div>
                                
                            </form>
                            <div class="row justify-content-center">
                                <a class="btn btn-dark w-50 my-3 bg-black" href="{{route('register.company')}}"><span>Registrarse</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

