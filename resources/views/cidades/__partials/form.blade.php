@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300">{{ $error }}</li>
    @endforeach
</ul>
@endif


@csrf
<input type="text" name="cidade" id="cidade" placeholder="Nome da Cidade" value="{{ $cidade->cidade ?? old('cidade') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner required">
<div class="col-span-6 sm:col-span-3">
    <label for="estado" class="block text-sm font-medium text-gray-700">Estado / UF </label>

    <select id="estado" name="estado" autocomplete="estado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm required" >
  
        @foreach($estados as $estado)
            <option value="{{$estado->id}}">{{$estado->name}}</option>
        @endforeach
    </select>
</div>
<button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">Enviar</button>