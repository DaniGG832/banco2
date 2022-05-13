
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  
                <form action="{{route('cuentas.store',[],false)}}" method="post">
  
                  @csrf
                  @method('post')
                
                  <label for="numero">Numero de cuenta</label>
                  <input type="number" name="numero" id="numero"autofocus value="{{old('numero')}}">
                  @error('numero')
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





