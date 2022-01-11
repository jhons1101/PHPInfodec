<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notas</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <table  BORDER="1">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PARCIAL 1</th>
            <th>PARCIAL 2</th>
            <th>PARCIAL 3</th>
            <th>FINAL</th>
        </tr>
        @foreach ($notas as $nota)
            <tr>
                <td>{{$nota->cod_nota}}</td>
                <td>{{$nota->nom_estudiante}}</td>
                <td>{{$nota->parcial1}}</td>
                <td>{{$nota->parcial2}}</td>
                <td>{{$nota->parcial3}}</td>
                <td>{{$nota->final}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
