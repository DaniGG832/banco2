<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('baja titulares a una cuenta') }}
    </h2>
  </x-slot>



  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


          <x-session />


          <p>Numero de cuenta: </p>{{ $cuenta->numero }}
          <br>
          <br>
          <form action="{{ route('cuentas.darBajaTitulares', $cuenta,true) }}" method="POST">

            @csrf
            
@method('post')
            <p>Clientes</p>
            <select name="quitar" id="quitar">
              
              <option value=""></option>
              
              @foreach ($cuenta->clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
              @endforeach

              
              
            </select>
            
            @error('quitar')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
              @enderror
          
<br>
<br>

            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">Enviar</button>
          </form>







        </div>
      </div>
    </div>
  </div>
</x-app-layout>
