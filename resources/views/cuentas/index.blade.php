<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('index cuentas') }}
    </h2>
  </x-slot>



  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


          <x-session />

          {{-- {{$cuentas}} --}}

          <table class="table text-gray-400 border-separate space-y-6 text-sm">
            <thead class="bg-blue-500 text-white">
              <tr>
                <th class="p-3">Id</th>

                <th class="p-3 text-left">Numero de cuenta</th>

                <th class="p-3 text-left">Clientes Titulares</th>

                <th class="p-3 text-left">Mostrar</th>

                <th class="p-3 text-left">Add Clientes</th>

                <th class="p-3 text-left">Baja Clientes</th>
                


              </tr>
            </thead>
            <tbody>

              @foreach ($cuentas as $cuenta)
                <tr class="bg-blue-200 lg:text-black">
                  <td class="p-3 font-medium capitalize">{{ $cuenta->id }}</td>
                  <td class="p-3">{{ $cuenta->numero }}</td>

                  <td class="p-3 uppercase">
                    @forelse ($cuenta->clientes as $cliente)
                      <p>
                        {{ $cliente->nombre }}
                      </p>
                    @empty
                      No tiene cliente asociado
                    @endforelse
                  </td>
                  <td class="p-3 bg-blue-700 ">

                    <a href="{{ route('cuentas.show', $cuenta, false) }}"
                      class="text-gray-100 hover:text-green-400 mr-2">
                      <i class="material-icons-outlined text-base">Mostrar</i>

                  </td>
                  <td class="p-3 bg-blue-700 ">

                    <a href="{{ route('cuentas.addTitulares', $cuenta, false) }}"
                      class="text-gray-100 hover:text-green-400 mr-2">
                      <i class="material-icons-outlined text-base">addClientes</i>

                  </td>
                  <td class="p-3 bg-blue-700 ">

                    <a href="{{ route('cuentas.bajaTitulares', $cuenta, false) }}"
                      class="text-gray-100 hover:text-green-400 mr-2">
                      <i class="material-icons-outlined text-base">baja Clientes</i>

                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>



        </div>
      </div>
    </div>
  </div>
</x-app-layout>
