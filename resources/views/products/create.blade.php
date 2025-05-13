@extends('layouts.dashboard')
@section('content')
@vite(['resources/css/app.css','resources/js/app.js'])

@php
    $kategoriUnik = collect($data)->map(function($product) {
        return $product->kategori;
    })->unique('id')->values();
@endphp

@php
    $supplierUnik = collect($data)->map(function($product) {
        return $product->supplier;
    })->unique('id')->values();
@endphp

<form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
  @csrf
    <div class="space-y-12 p-12">

  
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Penambahan Barang</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Isi form dibawah untuk mencatat barang</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="namaBarang" class="block text-sm/6 font-medium text-gray-900">Nama Barang</label>
            <div class="mt-2">
              <input type="text" name="namaBarang" id="namaBarang" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            @error('namaBarang')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="kategori" class="block text-sm/6 font-medium text-gray-900">Kategori</label>
            <div class="mt-2 grid grid-cols-1">
              {{-- <input type="text" name="kategori_id" id="kategori_id" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
 --}}



              <select id="kategori_id" name="kategori_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach($kategoriUnik as $product)
                <option value="{{$product->id}}">{{ $product->kategori }}</option>
                @endforeach
              </select>
              <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
              </svg>


            </div>
          </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="kategori" class="block text-sm/6 font-medium text-gray-900">Supplier</label>
            <div class="mt-2 grid grid-cols-1">
              {{-- <input type="text" name="kategori_id" id="kategori_id" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
 --}}



              <select id="supplier_id" name="supplier_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach($supplierUnik as $product)
                <option value="{{$product->id}}">{{ $product->nama }}</option>
                @endforeach
              </select>
              <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
              </svg>


            </div>
          </div>
        </div>


        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="stock" class="block text-sm/6 font-medium text-gray-900">Stock Minimum</label>
            <div class="mt-2">
              <input type="number" name="stock" id="stock" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>
        </div>
      

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="harga_beli" class="block text-sm/6 font-medium text-gray-900">Harga Beli</label>
          <div class="mt-2">
            <input type="number" name="harga_beli" id="harga_beli" step="0.01" min="0" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          </div>
        </div>
      </div>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="harga_jual" class="block text-sm/6 font-medium text-gray-900">Harga Jual</label>
          <div class="mt-2">
            <input type="number" name="harga_jual" id="harga_jual" step="0.01" min="0" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          </div>
        </div>
      </div>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="foto" class="block text-sm/6 font-medium text-gray-900">Foto</label>
          <div class="mt-2">
            <input type="file" name="foto" id="foto" step="0.01" min="0" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          </div>
        </div>
      </div>

    </div>
  
      
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="deskripsi" class="block text-sm/6 font-medium text-gray-900">Deskripsi Barang</label>
            <div class="mt-2">
              <textarea name="deskripsi" id="deskripsi" rows="4" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
            </div>
            <p class="mt-3 text-sm/6 text-gray-600">Tuliskan tentang deskripsi/keterangan barang</p>
          </div>
  
          
  
          {{-- <div class="col-span-full">
            <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Cover photo</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
              <div class="text-center">
                <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                  <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                </svg>
                <div class="mt-4 flex text-sm/6 text-gray-600">
                  <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500">
                    <span>Upload a file</span>
                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                  </label>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
              </div>
            </div>
          </div> --}}


        </div>
      </div>



    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6 m-10">
      <button type="submit" class="btn btn-primary">
        Simpan
    </button>
      <button type="button" class="text-sm/6 font-semibold text-gray-900"><a href="/produk"> Cancel</a></button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>
  
    @endsection