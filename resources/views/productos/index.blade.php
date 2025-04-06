<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Inventario de Productos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('productos.create') }}" class="btn btn-success mb-3">Nuevo Producto</a>

    <table class="table table-bordered">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->codigo }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary btn-sm">Editar</a>

                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No hay productos registrados.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
