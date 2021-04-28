@extends('layouts.app')

@section('title', 'Criar Novo Estado')

@section('content')
    <h1 class="text-center text-3xl uppercase font-black my-4">Novo Estado</h1>

    <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
        <form action="{{ route('estados.store') }}" method="post" enctype="multipart/form-data">
            @include('estados.__partials.form')
        </form>
    </div>
@endsection