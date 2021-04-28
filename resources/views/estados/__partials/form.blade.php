@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300">{{ $error }}</li>
    @endforeach
</ul>
@endif


@csrf
<input type="text" name="estado" id="estado" placeholder="Nome do Estado" style='text-transform:capitalize' value="{{ $estado->name ?? old('estado') }}" class=" capitalize block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner required">
<div class="col-span-6 sm:col-span-3">
    <label for="estado" class="block text-sm font-medium text-gray-700">UF (União Federativa) | Sigla </label>
    <input type="text" name="UF" id="UF" placeholder="Sigla do Estado Ex: SP" style='text-transform:uppercase' maxlength="2" value="{{ $estado->UF ?? old('UF') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner required">
    
</div>
<button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">Enviar</button>