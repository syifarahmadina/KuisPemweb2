@extends('layout.main')

@section('content')
<h1 class="font-bold text-2xl mb-5">Available Product</h1>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($availableProducts as $produk)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                {{$produk->id}}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$produk->name}}
                </th>
                <td class="px-6 py-4">
                {{$produk->price}}
                </td>
                <td class="px-6 py-4">
                {{$produk->stock}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection