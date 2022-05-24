<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('  Mostrar cuenta') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


          <p>cuenta: <span class="text-blue-700">{{ $cuenta->numero }}</span></p>

          <br>
          <p class="font-bold text-2xl">Titulares</p>

          <ul>

            @forelse ($cuenta->clientes as $cliente)
            <li>{{ $cliente->nombre }} -<span><a class="text-blue-400 hover:text-green-500 ml-2"
              href="{{ route('clientes.show', $cliente, false) }}">Mostar titular</a></span></li>
            @empty
            <span class="text-blue-700">No tiene clientes asociados</span>
            @endforelse
            

          </ul>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
