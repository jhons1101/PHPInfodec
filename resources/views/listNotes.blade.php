<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Notas</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col mt-5 text-center">
                <h3>Notas</h3>
                <hr />
                <div class="row">
                    <div class="col mt-2 mb-2 text-end">
                        <a href="/createNote">
                            <button type="button" class="btn btn-dark">NUEVO</button>
                        </a>
                    </div>
                </div>
                @if ($msg != '')<div class="alert alert-info">{{ $msg }}</div>@endif
                <div class="row">
                    <div class="col">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Nombres</th>
                                <th>Parcial 1</th>
                                <th>Parcial 2</th>
                                <th>Parcial 3</th>
                                <th>Final</th>
                                <th>&nbsp;</th>
                            </tr>
                            @foreach($notas as $nota)
                            <tr>
                                <td>{{$nota->nom_estudiante}}</td>
                                <td>{{$nota->parcial1}}</td>
                                <td>{{$nota->parcial2}}</td>
                                <td>{{$nota->parcial3}}</td>
                                <td class="@if($nota->final < 3) table-danger @else table-success @endif">{{$nota->final}}</td>
                                <td>
                                    <form method="POST" action="/delNota">
                                        @csrf
                                        <input type="hidden" name="cod_nota" value="{{$nota->cod_nota}}">
                                        <input type="hidden" name="_method" value="delete" />
                                        <button type="submit" class="btn btn-link">ELIMINAR</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>