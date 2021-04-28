@extends('layouts.app')

@section('title', "Editar a Cidade {$cidade->cidade}")

@section('content')
<h1 class="text-center text-3xl uppercase font-black my-4">Editar a cidade: <strong>{{ $cidade->cidade }}</strong></h1>

<div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
    <form action="{{ route('cidades.update', $cidade->id) }}" method="post">
        @method('put')
        @include('cidades.__partials.form')
    </form>
</div>
@endsection