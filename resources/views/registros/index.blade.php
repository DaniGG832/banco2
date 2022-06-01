<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Registros') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


          <x-session />

          {{-- {{$registros}} --}}

          <table class="table text-gray-400 border-separate space-y-6 text-sm">
            <thead class="bg-blue-500 text-white">
              <tr>
                <th class="p-3">Id</th>

                <th class="p-3 text-left">cuenta</th>

                <th class="p-3 text-left">Cliente</th>

                <th class="p-3 text-left">operacion</th>

                <th class="p-3 text-left">fecha</th>

                <th class="p-3 text-left">mostrar</th>
                


              </tr>
            </thead>
            <tbody>

              @foreach ($registros as $registro)
                <tr class="bg-blue-200 lg:text-black">
                  <td class="p-3 font-medium capitalize">{{  $registro->id}}</td>
                  <td class="p-3">{{ $registro->cuenta->numero }}</td>
                  <td class="p-3">{{ $registro->cliente->nombre }}</td>
                  <td class="p-3">{{ $registro->operacion->operacion }}</td>
                  <td class="p-3">{{ $registro->fecha_operacion }}</td>

                
                </tr>
              @endforeach

            </tbody>
          </table>





        </div>
      </div>
    </div>
  </div>
</x-app-layout>
