@extends('layout.layout')

@section('title')
    Inventory category page
@endsection


@section('content')
    <div class="w-full bg-white shadow shadow-gray-200 flex flex-col rounded p-2">
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <a href="/"
                    class="text-[#1447e6] themeFont text-lg">Product</a> / <span
                    class="themeFont text-gray-400 text-lg">Product Name here</span></h6>
        </div>
        <h2 class="themeFont text-3xl capitalize mt-4 font-normal px-2 ">Product Details</h2>
        <div class="w-full p-2 mt-4 flex flex-wrap">
            <div class="p-2 w-2/5 border border-gray-100">
                <div class="your-slider">
                    <div><img src="{{asset('assets/products/p-1.webp')}}" alt="Image 1"></div>
                    <div><img src="{{asset('assets/products/p-2.webp')}}" alt="Image 1"></div>
                    <div><img src="{{asset('assets/products/p-3.webp')}}" alt="Image 1"></div>
                </div>
            </div>
            <div class="p-2 pt-0 w-3/5">
                <table class="w-full border border-gray-100">
                    <tbody>
                        <tr>
                            <th class="border border-gray-100 p-3 text-left w-1/2 themeFont capitalize font-normal">
                                product Id
                            </th>
                            <td class="border border-gray-100 p-3 text-left w-1/2 themeFont text-gray-500 text-sm">
                                product Id here
                            </td>
                        </tr>
                        <tr>
                            <th class="border border-gray-100 p-3 text-left w-1/2 themeFont capitalize font-normal">
                                product Name
                            </th>
                            <td class="border border-gray-100 p-3 text-left w-1/2 themeFont text-gray-500 text-sm">
                                product Name here
                            </td>
                        </tr>
                        <tr>
                            <th class="border border-gray-100 p-3 text-left w-1/2 themeFont capitalize font-normal">
                               Purchasing Price
                            </th>
                            <td class="border border-gray-100 p-3 text-left w-1/2 themeFont text-gray-500 text-sm">
                                Purchasing Price
                            </td>
                        </tr>
                        <tr>
                            <th class="border border-gray-100 p-3 text-left w-1/2 themeFont capitalize font-normal">
                               Wholesale Price
                            </th>
                            <td class="border border-gray-100 p-3 text-left w-1/2 themeFont text-gray-500 text-sm">
                                Wholesale Price
                            </td>
                        </tr>
                        <tr>
                            <th class="border border-gray-100 p-3 text-left w-1/2 themeFont capitalize font-normal">
                               Retail Price
                            </th>
                            <td class="border border-gray-100 p-3 text-left w-1/2 themeFont text-gray-500 text-sm">
                                Retail Price
                            </td>
                        </tr>
                        <tr>
                            <th class="border border-gray-100 p-3 text-left w-1/2 themeFont capitalize font-normal">
                               Brand
                            </th>
                            <td class="border border-gray-100 p-3 text-left w-1/2 themeFont text-gray-500 text-sm">
                                brand name
                            </td>
                        </tr>
                        <tr>
                            <th class="border border-gray-100 p-3 text-left w-1/2 themeFont capitalize font-normal">
                               stock (quantity)
                            </th>
                            <td class="border border-gray-100 p-3 text-left w-1/2 themeFont text-gray-500 text-sm">
                                stock 
                            </td>
                        </tr>
                        <tr>
                            <th class="border border-gray-100 p-3 text-left w-1/2 themeFont capitalize font-normal">
                               Category
                            </th>
                            <td class="border border-gray-100 p-3 text-left w-1/2 themeFont text-gray-500 text-sm">
                                Category here 
                            </td>
                        </tr>
                        <tr>
                            <th class="border border-gray-100 p-3 text-left w-1/2 themeFont capitalize font-normal">
                               Description
                            </th>
                            <td class="border border-gray-100 p-3 text-left w-1/2 themeFont text-gray-500 text-sm">
                                Description here 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @push('style')
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        @endpush

        @push('scripts')
            <script>
                $('.your-slider').slick({
                    dots: true,
                    arrows: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            </script>
        @endpush
    @endsection
