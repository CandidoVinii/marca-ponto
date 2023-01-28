<!DOCTYPE html>
<html>
<head>
    <title>Download PDF</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h1>Dados do banco de dados</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Chegada</th>
                <th>Saida</th>
                <th>Horas Diurnas</th>
                <th>Horas Noturnas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->ponto_chegada }}</td>
                <td>{{ $row->ponto_saida }}</td>
                <td>{{ $row->horas_diurnas }}</td>
                <td>{{ $row->horas_noturnas }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
