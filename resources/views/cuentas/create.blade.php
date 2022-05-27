
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Crear cuenta') }}
      </h2>
  </x-slot>


  
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                
                
                <x-session/>
  
                

                <form action="{{route('cuentas.store',[],false)}}" method="post">
                
                  @csrf
                   @method('POST') 
                
                  <label for="numero">Numero de cuenta</label>
                  <input class="w-64" type="number" name="numero" id="numero" autofocus value="{{old('numero','1234567890'."$nCuenta")}}">
                  
                  @error('numero')
                  <p class="text-red-500 text-sm mt-1">
                      {{ $message }}
                  </p>
                @enderror
                
                
                  <br>
                  Agregar titular
                  <select name="titular" id="titular">
                    <option value=""></option>
                    @foreach ($clientes as $cliente)

                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>

                    @endforeach

                  </select>
                  @error('titular')
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






