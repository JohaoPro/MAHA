@extends('layouts.app')


@section('content')
    <h1 class="text-center text-gray-800 text-2xl font-medium">Elige una Mesa</h1>

    <div class="flex flex-wrap justify-evenly mt-4 gap-4">

        @foreach($mesas as $mesa)

            <a class="bg-gray-200  w-[150px] h-[100px] p-4 rounded">
                
                <p class="text-center mt-3 font-medium text-gray-800">Mesa {{ $mesa->numero }}</p>
                
                <button onclick="window.location='{{ route('platillos.index') }}'" class="w-full p-2 bg-green-700 hover:bg-green-800 text-white rounded cursor-pointer"
                    >seleccionar</button>
            </a>

        @endforeach

    </div>

@endsection