@extends('layouts.app')

@section('title', "Editar a Estado (UF) {$estado->name}")

@section('content')
<h1 class="text-center text-3xl uppercase font-black my-4">Editar o Estado: <strong>{{ $estado->name }}</strong></h1>

<div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
    <form action="{{ route('estados.update', $estado->id) }}" method="post">
        @method('put')
        @include('estados.__partials.form')
    </form>
</div>
@endsection