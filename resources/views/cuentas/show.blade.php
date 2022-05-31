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
        <br>
            <p>cuenta: <span class="text-blue-700">{{ $cuenta->numero }}</span></p>
            <br>

            <p>Saldo: <span class="text-blue-500">{{ $cuenta->movimientos->sum('importe') }} €</span></p>
            <br>

            <p>Movimientos</p>

  <br>
  <table class="table text-gray-400 border-separate space-y-6 text-sm">
    <thead class="bg-blue-500 text-white">
      <tr>
        <th class="p-3">Concepto</th>
        <th class="p-3 text-left">fecha</th>
        <th class="p-3 text-left">Importe</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($cuenta->movimientos as $movimiento)
        <tr class="bg-blue-100 lg:text-black">
          <td class="p-3 font-medium capitalize">{{ $movimiento->concepto}}</td>
          <td class="p-3">{{ $movimiento->fecha }}</td>
          <td class="p-3 uppercase">{{ $movimiento->importe }} €</td>
          
          
        </tr>
        @endforeach
        </tbody>
      </table>

  
  <br>
  <h2>Añadir movimiento</h2>

  <form action="{{route('movimientos.store',[],false)}}" method="post">

@method('post')
    @csrf
    <input type="hidden" name="cuenta_id" value="{{$cuenta->id}}">

      <label for="concepto">Concepto</label>

      <input type="text" name="concepto" required autofocus value="{{old('concepto')}}">

      @error('concepto')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror
<br>

      <label for="importe">Importe</label>

      <input type="number" step="0.01" name="importe" required  value="{{old('importe')}}"">
      @error('importe')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror
<br>
    <button type="submit">Enviar</button>
  </form>
  

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
