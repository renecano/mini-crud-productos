<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f6f9;
        }

        .container {
            max-width: 500px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin: auto;
        }

        h1 {
            text-align: center;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button, a {
            display: inline-block;
            padding: 10px 14px;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        button {
            background: #28a745;
            color: white;
        }

        a {
            background: #6c757d;
            color: white;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Producto</h1>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <label>Nombre</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Descripción</label>
            <textarea name="description">{{ old('description') }}</textarea>

            <label>Precio</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}">
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Stock</label>
            <input type="number" name="stock" value="{{ old('stock') }}">
            @error('stock')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Guardar</button>
            <a href="{{ route('products.index') }}">Volver</a>
        </form>
    </div>
</body>
</html>