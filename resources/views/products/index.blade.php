<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f6f9;
        }

        h1 {
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            text-decoration: none;
            border-radius: 6px;
            color: white;
            margin-bottom: 15px;
        }

        .btn-add {
            background: #28a745;
        }

        .btn-edit {
            background: #007bff;
            padding: 6px 10px;
            font-size: 14px;
        }

        .btn-delete {
            background: #dc3545;
            padding: 6px 10px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background: #343a40;
            color: white;
        }

        .alert {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
        }

        .actions {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>

    <h1>Inventario de Productos</h1>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-add">Agregar producto</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">Editar</a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay productos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>