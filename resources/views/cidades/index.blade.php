@extends('layouts.app')

@section('title', 'Lista de cidades')


@section('content')
<!-- This example requires Tailwind CSS v2.0+ -->

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                <div class="flex justify-end">
                    <a href="{{ route('cidades.create') }}" class="my-4 uppercase px-8 py-2 rounded bg-indigo-600 text-indigo-50 max-w-max shadow-sm hover:shadow-lg ">Cadastrar Cidade</a>
                </div>

                <form action="{{ route('cidades.search') }}" method="post" class="bg-white">
                    @csrf
                    <div class="max-w-sm my-4 p-1 pr-0 flex items-center">
                        <input type="text" name="search" placeholder="Filtrar:" class="flex-1 appearance-none rounded shadow p-3 text-grey-dark mr-2 focus:outline-none">
                        <button type="submit" class="uppercase p-3 rounded bg-blue-500 text-blue-50 max-w-max shadow-sm hover:shadow-lg">Filtrar</button>
                    </div>
                </form>
                @if(isset($duble))
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300 ">
                    <strong>Há mais de um item por favor verifique os dados!</strong>
                </div>
                @endif
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cidade
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach($cidades as $city)

                        <tr>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$city->id}}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $city->cidade}}
                                        </div>

                                        <div class="text-sm text-gray-500">
                                            @if(optional($city->estado)->UF)
                                            {{optional($city->estado)->UF}}
                                            @else
                                            {{ $city->UF }}

                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('cidades.show', $city->id) }}" class="py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75"> Ver</a>

                                <a href="{{ route('cidades.edit', $city->id) }}" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Editar</a>

                            </td>
                        </tr>
                        @endforeach



                        <!-- More people... -->
                    </tbody>
                </table>

            </div>
            @if (isset($filters))
            {{ $cidades->appends($filters)->links() }}
            @else
            {{ $cidades->links() }}
            @endif

        </div>
    </div>

</div>

@endsection