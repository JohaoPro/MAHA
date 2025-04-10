@extends('layouts.app')


@section('content')
    
    <h1 class="text-center text-gray-800 text-2xl font-medium">Lista de Platillos por Categoria Seleccionada  </h1>
    
    <div class="flex flex-wrap justify-evenly mt-4 gap-4">

        @foreach($platillos as $platillo)

            <div  class="bg-gray-200 w-[300px] h-[200px] p-4 rounded ">
                
                <p class="text-center mt-3 font-medium text-gray-800">{{ $platillo->nombre }}</p>
                <p class="text-center mt-3 font-medium text-gray-800">{{ $platillo->precio }}</p>
                <button 
                    class="w-full p-2 bg-green-700 hover:bg-green-800 text-white rounded cursor-pointer"
                    >seleccionar</button>
            </div>

        @endforeach

    </div>

@endsection
