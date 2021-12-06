<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Nueva nota</title>
    <script type="text/javascript">
        function soloLetras(obj) {
            if (!/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]*$/g.test(obj.value)) {
                var nom_estudiante = obj.value;
                obj.value = nom_estudiante.substring(0, nom_estudiante.length - 1);
                obj.focus();
                return false;
            }
        }

        function soloNota(obj) {
            console.log(obj.value.length);
            if (obj.value > 5 || obj.value < 1) {
                var parcial = obj.value;
                obj.value = parcial.substring(0, parcial.length - 1);
                obj.focus();
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col mt-5 text-center">
                <h3>Notas</h3>
                <hr />
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($msg != '')<div class="alert alert-info">{{ $msg }}</div>@endif
                <form action="/newNota" name="notas" method="POST" id="frm">
                    @csrf
                    <div class="row">
                        <div class="mb-3 row">
                            <label for="txtNombre" class="col-sm-3 col-form-label">Nombres</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nom_estudiante" id="txtNombre" required="true" maxlength="100" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="soloLetras(this)">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="txtParcial1" class="col-sm-3 col-form-label">Parcial 1</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="parcial1" id="txtParcial1" required="true" min="1" max="5" onkeyup="soloNota(this)" step="0.1">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="txtParcial2" class="col-sm-3 col-form-label">Parcial 2</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="parcial2" id="txtParcial2" required="true" min="1" max="5" onkeyup="soloNota(this)" step="0.1">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="txtParcial3" class="col-sm-3 col-form-label">Parcial 3</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="parcial3" id="txtParcial3" required="true" min="1" max="5" onkeyup="soloNota(this)" step="0.1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-2 mb-2 text-center">
                            <button type="submit" class="btn btn-dark">REGISTRAR</button>
                            <a href="/">
                                <button type="button" class="btn btn-link">VOLVER</button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-5 text-center">
                            <h3>FINAL: {{ $final }}</h3>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>