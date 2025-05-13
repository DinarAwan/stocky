@extends('example.layouts.default.dashboardAdmin')
@section('content')
<div class="px-4 pt-6">
    
  <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
    <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
      <div class="w-full">
        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Jumlah Produk</h3>
        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$data}}</span>
        <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
          
        </p>
      </div>
      <div class="w-full" id="new-products-chart"></div>
    </div>
    <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
      <div class="w-full">
        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Barang Masuk</h3>
        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$masuk}}</span>
        <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
          
          Sejak 23.00 Hari Ini
        </p>
      </div>
      <div class="w-full" id="new-products-chart"></div>
    </div>
    <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
      <div class="w-full">
        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Barang keluar</h3>
        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$keluar}}</span>
        <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
          
          Sejak 23.00 Hari Ini
        </p>
      </div>
      <div class="w-full" id="new-products-chart"></div>
    </div>
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
      <div class="w-full">
        <h3 class="mb-2 text-base font-normal text-gray-500 dark:text-gray-400">STOCK</h3>
        <div class="flex items-center mt-9">
          <div class="w-16 text-sm font-medium dark:text-white">50+</div>
          <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
            <div class="bg-primary-600 h-2.5 rounded-full dark:bg-primary-500" style="width: 18%"></div>
          </div>
        </div>
        
      </div>
      <div id="traffic-channels-chart" class="w-full"></div>
    </div>
  </div>
  <div class="grid grid-cols-1 my-4 xl:grid-cols-2 xl:gap-4">

    
    
      
    
  </div>
</div>
@endsection
