@extends('layouts.app')

@section('title', 'Detalhes do Estado')

@section('content')
    <h1 class="text-center text-3xl uppercase font-black my-4">Detalhes do Estado (UF): {{ $consulta->name }}</h1>
   
    <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
        <ul>
            <li><strong>Nome: </strong>{{ $consulta->name }}</li>
            <li><strong>Estado (UF): </strong>{{$consulta->UF ?? ''}}</li>
           
        </ul>

        <form action="{{ route('estados.destroy', $consulta->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red-500 shadow-lg focus:outline-none hover:bg-red-900 hover:shadow-none">Deletar o Estado: {{ $consulta->name }}</button>
        </form>
    </div>
@endsection