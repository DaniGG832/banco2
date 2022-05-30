<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('  Mostrar Cliente') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


          <p>Cliente: <span class="text-blue-700">{{ $cliente->nombre }}</span></p>

          <br>
          <p class="font-bold text-2xl">Numeros de cuenta</p>

          <ul>

            @forelse ($cliente->cuentas as $cuenta)
            <li>{{ $cuenta->numero }} -<span><a class="text-blue-400 hover:text-green-500 ml-2"
              href="{{ route('cuentas.show', $cuenta, false) }}">Mostar Titulares</a></span></li>
            @empty
            <span class="text-blue-700">No tiene cuentas asociadas</span>
            @endforelse
            

          </ul>

<br>
        

          
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
