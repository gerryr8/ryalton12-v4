<?php include "dataseconect.php";
header("location: login.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resguardo de equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
</head>

<body background="https://static.vecteezy.com/system/resources/previews/001/176/927/non_2x/blue-and-white-abstract-background-vector.jpg" style="color: black ;">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3>Application backup</h3>
                <hr>
                <form action="" id="form" method="post">
                    <div class="mb-3">
                        <label for="departamentos" class="form-label">Deparment</label>
                        <select class="form-select" id="departamentos" name="departamento">
                            <option value="">Departamento</option>
                            <option value="ayb">AyB
                            </option>
                            <option value="it">It
                            </option>
                            <option value="Talento y cultura">Talento y cultura
                            </option>
                            <option value="Finanzas">Finanzas
                            </option>
                            <option value="Costos">Costos
                            </option>
                            <option value="Guest service">Guest service
                            </option>
                            <option value="Bluen line">Blue line
                            </option>
                        </select>
                    </div>



                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Last names</label>
                            <input type="text" class="form-control" id="nombre" name="nombres">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="puesto" class="form-label">Position</label>
                                <input type="text" class="form-control" id="puesto" name="puesto">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="numerodealfitrion" class="form-label">N° host</label>
                                    <input type="text" class="form-control" id="numerodealfitrion" name="n_anfitrion">
                                </div>




                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div>
                                            <label for="" class="checkbox-inline">New hotel</label>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="newhotels" class="form-check-input" id="discapacidad-si" value="1">
                                                <label for="discapacidad-si" class="checkbox-inline">Si</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="newhotels" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                <label for="discapacidad-no" class="checkbox-inline">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div>
                                                <label for="" class="form-label">New post</label>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="newposts" class="form-check-input" id="discapacidad-si" value="1">
                                                    <label for="discapacidad-si" class="form-check-label">Si</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="newposts" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                    <label for="discapacidad-no" class="form-check-label">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <div>
                                                    <label for="" class="form-label">New spa</label>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="newspas" class="form-check-input" id="discapacidad-si" value="1">
                                                        <label for="discapacidad-si" class="form-check-label">Si</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="newspas" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                        <label for="discapacidad-no" class="form-check-label">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div>
                                                        <label for="" class="form-label">New change</label>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="newchanges" class="form-check-input" id="discapacidad-si" value="1">
                                                            <label for="discapacidad-si" class="form-check-label">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="newchanges" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                            <label for="discapacidad-no" class="form-check-label">No</label>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <div>
                                                            <label for="" class="form-label">Usuario pc/Remoto
                                                                (AD)</label>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="usuarioremotos" class="form-check-input" id="discapacidad-si" value="1">
                                                                <label for="discapacidad-si" class="form-check-label">Si</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="usuarioremotos" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                                <label for="discapacidad-no" class="form-check-label">No</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-3">
                                                            <div>
                                                                <label for="" class="form-label">Correo
                                                                    electronico</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" name="Correoelectronicos" class="form-check-input" id="discapacidad-si" value="1">
                                                                    <label for="discapacidad-si" class="form-check-label">Si</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" name="Correoelectronicos" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                                    <label for="discapacidad-no" class="form-check-label">No</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-md-3">
                                                                <div>
                                                                    <label for="" class="form-label">Internet (sitios
                                                                        especificos)</label>
                                                                    <div class="form-check form-check-inline">
                                                                        <input type="radio" name="internets" class="form-check-input" id="discapacidad-si" value="1">
                                                                        <label for="discapacidad-si" class="form-check-label">Si</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input type="radio" name="internets" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                                        <label for="discapacidad-no" class="form-check-label">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <label for="" class="form-label">Pin de impresion</label>
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="radio" name="pins" class="form-check-input" id="discapacidad-si" value="1">
                                                                            <label for="discapacidad-si" class="form-check-label">Si</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="radio" name="pins" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                                            <label for="discapacidad-no" class="form-check-label">No</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-3">
                                                                        <div>
                                                                            <label for="" class="form-label">Vision online (Vincard)</label>

                                                                            <div class="form-check form-check-inline">
                                                                                <input type="radio" name="visions" class="form-check-input" id="discapacidad-si" value="1">
                                                                                <label for="discapacidad-si" class="form-check-label">Si</label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <input type="radio" name="visions" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                                                <label for="discapacidad-no" class="form-check-label">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="col-md-3">
                                                                            <div>

                                                                                <label for="" class="form-label">Abrhil aplicativo</label>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input type="radio" name="aplicativos" class="form-check-input" id="discapacidad-si" value="1">
                                                                                    <label for="discapacidad-si" class="form-check-label">Si</label>
                                                                                </div>

                                                                                <div class="form-check form-check-inline">
                                                                                    <input type="radio" name="aplicativos" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                                                    <label for="discapacidad-no" class="form-check-label">No</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="row mb-3">
                                                                            <div class="col-md-3">

                                                                                <div>

                                                                                    <label for="" class="form-label">Abrhil asistencia (web)</label>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input type="radio" name="asistencias" class="form-check-input" id="discapacidad-si" value="1">
                                                                                        <label for="discapacidad-si" class="form-check-label">Si</label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input type="radio" name="asistencias" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                                                        <label for="discapacidad-no" class="form-check-label">No</label>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <label for="" class="form-label">Sistema zafiro</label>
                                                                                        <div class="form-check form-check-inline">
                                                                                            <input type="radio" name="zafiros" class="form-check-input" id="discapacidad-si" value="1">
                                                                                            <label for="discapacidad-si" class="form-check-label">Si</label>
                                                                                        </div>
                                                                                        <div class="form-check form-check-inline">
                                                                                            <input type="radio" name="zafiros" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                                                            <label for="discapacidad-no" class="form-check-label">No</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>




                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-3">
                                                                                        <div>
                                                                                            <label for="" class="form-label">Consola verkada</label>
                                                                                            <div class="form-check form-check-inline">
                                                                                                <input type="radio" name="consolas" class="form-check-input" id="discapacidad-si" value="1">
                                                                                                <label for="discapacidad-si" class="form-check-label">Si</label>
                                                                                            </div>
                                                                                            <div class="form-check form-check-inline">
                                                                                                <input type="radio" name="consolas" class="form-check-input" id="discapacidad-no" value="0" checked>
                                                                                                <label for="discapacidad-no" class="form-check-label">No</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>





                                                                                    <span class="d-block pb-2">Firma digital aqui</span>
                                                                                    <div class="signature mb-2" style="width: 50%; height: 100px;">
                                                                                        <canvas id="signature-canvas" style="border: 1px dashed red; width: 500%; height: 100px;"></canvas>
                                                                                    </div>

                                                                                    <button type="submit" class="btn btn-success">Success</button>

                                                                                </div>
                </form>
            </div>
        </div>
    </div>
<script src="app.js"></script>
</body>

</html>