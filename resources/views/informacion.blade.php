@extends('layouts.app')

    
@section('content')

    <div class="container mx-auto p-4">
    @auth  
    <h1 class="text-2xl font-semibold text-center text-gray-800">Perfil del Usuario</h1>

        <div class="mt-6 p-4 border rounded-lg">
            <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
            <p><strong>Fecha de creación:</strong> {{ $usuario->created_at->format('d/m/Y') }}</p>
            <p><strong>Última actualización:</strong> {{ $usuario->updated_at->format('d/m/Y') }}</p>
        </div>
    @endauth
    @guest
    no estas autenticado
    @endguest
    </div>
@endsection

