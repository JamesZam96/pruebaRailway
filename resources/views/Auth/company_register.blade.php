<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Empresa</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
            background-color: black
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
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
        .custom-form input:focus, .custom-form input:hover {
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
        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
          background-color: #dc3545;
          border-color: #dc3545;
          }

        .custom-checkbox .custom-control-input:focus ~ .custom-control-label::before {
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        .step { display: none; }
        .step.active { display: block; }
    </style>
</head>
<body>
    <div class="container">
        <div class="custom-form">
            <h2 class="text-center mb-4">Registrar Empresa</h2>
            <form method="POST" action="{{ route('register.company.submit') }}" id="registerForm" enctype="multipart/form-data">
                @csrf
                <!-- Paso 1: Información Personal -->
                <div class="step active" id="step1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
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
                                <label for="country">País</label>
                                <input type="text" name="country" id="country" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary btn-block" onclick="nextStep()">Siguiente</button>
                        </div>
                    </div>
                </div>

                <!-- Paso 2: Información de la Empresa -->
                <div class="step" id="step2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_name">Nombre de la Empresa</label>
                                <input type="text" name="company_name" id="company_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="legal_representative_name">Nombre del Representante Legal</label>
                                <input type="text" name="legal_representative_name" id="legal_representative_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="legal_representative_lastname">Apellido del Representante Legal</label>
                                <input type="text" name="legal_representative_lastname" id="legal_representative_lastname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="legal_representative_dni">DNI del Representante Legal</label>
                                <input type="text" name="legal_representative_dni" id="legal_representative_dni" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nit">NIT</label>
                                <input type="text" name="nit" id="nit" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="person_type">Tipo de Persona</label>
                                <input type="text" name="person_type" id="person_type" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="legal_representative_email">Correo del Representante Legal</label>
                                <input type="email" name="legal_representative_email" id="legal_representative_email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="legal_name_company">Nombre Legal de la Empresa</label>
                                <input type="text" name="legal_name_company" id="legal_name_company" class="form-control" required>
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

                <!-- Paso 3: Aceptación de Términos -->
                <div class="step" id="step3">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="terms_and_conditions" id="terms_and_conditions" class="custom-control-input" value="1" required>
                                    <label for="terms_and_conditions" class="custom-control-label">Aceptar Términos y Condiciones</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="processing_of_personal_data" id="processing_of_personal_data" class="custom-control-input" value="1" required>
                                    <label for="processing_of_personal_data" class="custom-control-label">Aceptar Tratamiento de Datos Personales</label>
                                </div>
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

                <!-- Paso 4: Subida de Documentos -->
                <div class="step" id="step4">
                    <div class="form-group">
                        <label for="pdf_single_tax_registry">PDF Registro Único Tributario</label>
                        <input type="file" name="pdf_single_tax_registry" id="pdf_single_tax_registry" class="form-control" accept="application/pdf" required>
                    </div>
                    <div class="form-group">
                        <label for="pdf_bank_certificate">PDF Certificado Bancario</label>
                        <input type="file" name="pdf_bank_certificate" id="pdf_bank_certificate" class="form-control" accept="application/pdf" required>
                    </div>
                    <div class="form-group">
                        <label for="pdf_legal_representative_dni">PDF DNI del Representante Legal</label>
                        <input type="file" name="pdf_legal_representative_dni" id="pdf_legal_representative_dni" class="form-control" accept="application/pdf" required>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="prevStep()">Anterior</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep()">Siguiente</button>
                </div>

                <!-- Paso 5: Información Bancaria -->
                <div class="step" id="step5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_holder_name">Nombre del Titular de la Cuenta</label>
                                <input type="text" name="account_holder_name" id="account_holder_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="account_holder_lastname">Apellido del Titular de la Cuenta</label>
                                <input type="text" name="account_holder_lastname" id="account_holder_lastname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="bank_name">Nombre del Banco</label>
                                <input type="text" name="bank_name" id="bank_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="account_type">Tipo de Cuenta</label>
                                <input type="text" name="account_type" id="account_type" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_number">Número de Cuenta</label>
                                <input type="text" name="account_number" id="account_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="billing_address">Dirección de Facturación</label>
                                <input type="text" name="billing_address" id="billing_address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="billing_contact_phone_number">Teléfono de Contacto de Facturación</label>
                                <input type="text" name="billing_contact_phone_number" id="billing_contact_phone_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="billing_contact_email">Correo Electrónico de Contacto de Facturación</label>
                                <input type="email" name="billing_contact_email" id="billing_contact_email" class="form-control" required>
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
            if (currentStep < 5) {
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
