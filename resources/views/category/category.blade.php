@extends('layout.layout')

@section('title')
    Inventory category page
@endsection


@section('content')
    <div class="w-full bg-white shadow shadow-gray-200 flex flex-col rounded p-2">
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <span
                    class="themeFont text-gray-400 text-lg">category</span></h6>
        </div>
        <h2 class="themeFont text-3xl capitalize mt-4 font-semibold px-2 ">Add Category</h2>
        <div class="w-full py-6 mt-6 border-t border-t-gray-100 flex items-center justify-center">
            <div class="w-full flex flex-col gap-1">

                {{-- table ends here --}}

                <div class="w-full overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 themeFont">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sno
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Parent Category
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Publish Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>


                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 themeFont">
                            <!-- Sample product row (similar to your image) -->
                            @foreach ($categories as $index => $category)
                                <tr>
                                    {{-- Serial Number --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                                    </td>

                                    {{-- Category Name --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                                    </td>

                                    {{-- Slug --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $category->slug }}</div>
                                    </td>

                                    {{-- Category Image --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($category->image)
                                            <img src="{{ asset('storage/uploads/' . $category->image) }}" alt="Product"
                                                class="w-12 h-12 object-cover rounded">
                                        @else
                                            <span class="text-gray-400 text-sm">No Image</span>
                                        @endif
                                    </td>

                                    {{-- Static Date (Update to dynamic if needed) --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $category->created_at }}
                                    </td>

                                    {{-- Action Buttons --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-900" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach



                            <!-- Additional product rows would be here -->
                        </tbody>
                    </table>
                </div>


                {{-- table ends here --}}
                <div class="flex flex-wrap justify-between p-2">
                    <div class="w-[50%] flex gap-2 items-center themeFont text-sm">
                        Showing {{ $categories->count() }} out of <span>{{ $categories->total() }}</span> categories
                    </div>
                    <div class="w-[50%] flex justify-end gap-2">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
