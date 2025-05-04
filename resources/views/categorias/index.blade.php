<title>Listado de Categorías</title>
</head>
<body>
    <h1>Categorías Disponibles</h1>
    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->nombre }}</td>
                    <td>{{ $cat->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
