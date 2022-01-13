<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
    <style>
        table {
            border:1px;
            border-collapse: collapse;
            width: 100%;
            margin: 5px 0;
        }
        th, td {
            padding: 7px;
            border: 1px solid;
        }
        button {
            padding: 3px 10px;
        }
    </style>
</head>
<body>
    <a href="{{ route('exportExcel') }}"><button>EXPORTAR DATOS</button></a>
    <a href="{{ route('callJob') }}"><button>EJECUTAR JOB</button></a>

    <table>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>NÚMERO</th>
            <th>FECHA</th>
            <th>CREATE_AT</th>
            <th>UPDATE_AT</th>
        </tr>
        @foreach($pruebas as $prueba)
        <tr>
            <td>{{$prueba->id}}</td>
            <td>{{$prueba->name}}</td>
            <td>{{$prueba->numero}}</td>
            <td>{{$prueba->fecha}}</td>
            <td>{{$prueba->created_at}}</td>
            <td>{{$prueba->updated_at}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
