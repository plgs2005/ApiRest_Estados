

@if ($message = Session::get('success'))
<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300">
   
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-700 bg-red-100 border border-red-300 ">
    
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300 ">
   
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-blue-700 bg-blue-100 border border-blue-300 ">
    
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($errors->any())
<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300 ">
    
    Por favor, verifique o formulário abaixo para erros
</div>
@endif

@if ($message = Session::get('duble'))
<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-warning-700 bg-blue-100 border border-warning-300 ">
    <strong>{{ $message }}</strong>
</div>
@endif
