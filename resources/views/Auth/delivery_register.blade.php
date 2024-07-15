<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Domiciliario</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            background-color: black;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .custom-form {
            background-color: #ffffff;
            transition: background-color 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            padding: 2rem;
        }
        .custom-form input:focus, .custom-form select:focus {
            border-color: #dc3545;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-primary:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .step { display: none; }
        .step.active { display: block; }
    </style>
</head>
<body>
    <div class="container">
        <div class="custom-form">
            <h2 class="text-center mb-4">Regístrate como Domiciliario</h2>
            <form method="POST" action="{{ route('register.delivery.submit') }}" id="registerForm" enctype="multipart/form-data">
                @csrf
                <!-- Step 1: User Information -->
                <div class="step active" id="step1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="country">País</label>
                                <input type="text" name="country" id="country" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Apellido</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar contraseña</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary btn-block" onclick="nextStep()">Siguiente</button>
                        </div>
                    </div>
                </div>
                
                <!-- Step 2: Delivery Information -->
                <div class="step" id="step2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Género</label>
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="" hidden>Selecciona una opción</option>
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Fecha de nacimiento</label>
                                <input type="date" name="birth_date" id="birth_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vehicle_type">Tipo de vehículo</label>
                                <select class="form-control" name="vehicle_type" id="vehicle_type" required>
                                    <option value="" hidden>Selecciona una opción</option>
                                    <option value="Moto">Moto</option>
                                    <option value="Carro">Carro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary btn-block" onclick="prevStep()">Anterior</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary btn-block" onclick="nextStep()">Siguiente</button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Document Upload -->
                <div class="step" id="step3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dni_document_front">Documento de identificación (parte frontal)</label>
                                <input type="file" name="dni_document_front" id="dni_document_front" class="form-control-file" required>
                            </div>
                            <div class="form-group">
                                <label for="dni_document_back">Documento de identificación (parte trasera)</label>
                                <input type="file" name="dni_document_back" id="dni_document_back" class="form-control-file" required>
                            </div>
                            <div class="form-group">
                                <label for="driving_license">Licencia de conducción</label>
                                <input type="file" name="driving_license" id="driving_license" class="form-control-file" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="transit_license">Licencia de tránsito</label>
                                <input type="file" name="transit_license" id="transit_license" class="form-control-file" required>
                            </div>
                            <div class="form-group">
                                <label for="mandatory_insurance">SOAT (seguro obligatorio)</label>
                                <input type="file" name="mandatory_insurance" id="mandatory_insurance" class="form-control-file" required>
                            </div>
                            <div class="form-group">
                                <label for="profile_photo">Foto de perfil</label>
                                <input type="file" name="profile_photo" id="profile_photo" class="form-control-file" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary btn-block" onclick="prevStep()">Anterior</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Finalizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentStep = 1;

        function showStep(step) {
            document.querySelectorAll('.step').forEach((element, index) => {
                element.classList.remove('active');
                if (index === step - 1) {
                    element.classList.add('active');
                }
            });
        }

        function nextStep() {
            if (currentStep < 3) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>