@extends('layouts.dashboard')
@section('content')
@vite(['resources/css/app.css','resources/js/app.js'])


<form method="POST" action="{{ route('kategori.store') }}"> 
    
  @csrf
    <div class="space-y-12 p-12">

  
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Penambahan Barang</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Isi form dibawah untuk mencatat barang</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="kategori" class="block text-sm/6 font-medium text-gray-900">Kategori</label>
            <div class="mt-2">
              <input type="text" name="kategori" id="kategori" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            @error('kategori')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
      </div>
  
      
      {{-- <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="deskripsi" class="block text-sm/6 font-medium text-gray-900">Deskripsi Barang</label>
            <div class="mt-2">
              <textarea name="deskripsi" id="deskripsi" rows="4" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
            </div>
            <p class="mt-3 text-sm/6 text-gray-600">Tuliskan tentang deskripsi/keterangan barang</p>
          </div>
        </div>
      </div> --}}



    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6 m-10">
      <button type="submit" class="btn btn-primary">
        Simpan
    </button>
      <button type="button" class="text-sm/6 font-semibold text-gray-900"><a href="/kategori"> Cancel</a></button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>
  
    @endsection