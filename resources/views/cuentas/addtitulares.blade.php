<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Agregar titulares a una cuenta') }}
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
          <form action="{{ route('cuentas.agregarTitulares', $cuenta) }}" method="POST">

            @csrf
            @method('post')

            <p>Clientes</p>
            <select name="agregar" id="agregar">
              
              <option value=""></option>
              
              @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
              @endforeach


            </select>
            <br>
            <br>
            <p>Clientes</p>

            @foreach ($clientes as $cliente)
              <input type="checkbox" id="{{ $cliente->id }}" name="titulares[]" value="{{ $cliente->id }}">
              <label for="{{ $cliente->id }}"> {{ $cliente->nombre }}</label><br>
            @endforeach


            <button type="submit">Enviar</button>
          </form>







        </div>
      </div>
    </div>
  </div>
</x-app-layout>
