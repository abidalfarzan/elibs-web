@extends('dashboard.layout.main')

@section('content')
<div class="grid grid-cols-12 gap-4">
    <div class="col-span-12 lg:col-span-9 p-4">
    
        @if (session()->has('success'))
            
            <div class="mb-5 rounded-lg bg-green-100 px-6 py-5 text-sm text-green-800 border border-green-300" role="alert">
                {{ session('success') }}
            </div>

        @endif
        <a href="/dashboard/author/create" class="px-5 py-3 bg-sky-300 rounded-md text-gray-500 hover:bg-sky-400 transition">Add Author</a>
    </div>
</div>

<div class="grid grid-cols-12 gap-4  rounded-md">
    <div class="col-span-12 lg:col-span-9 p-4">
        <div class="relative overflow-x-auto">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($authors as $author)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">
                            {{ $author->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $author->slug }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-yellow-500">
                                <a href="/dashboard/author/{{ $author->slug }}/edit">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                            </div>

                            <div class="text-rose-500">
                                <form action="/dashboard/author/{{ $author->slug }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:cursor-pointer">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    

                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection 