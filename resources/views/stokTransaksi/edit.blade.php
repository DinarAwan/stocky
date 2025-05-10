@extends('example.layouts.default.dashboardManager')
@section('content')

<form method="post" action="{{$stok->id}}"> 
    
    @csrf
      <div class="space-y-12 p-12">
  
    
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base/7 font-semibold text-gray-900">Penambahan </h2>
          <p class="mt-1 text-sm/6 text-gray-600">Isi form dibawah untuk mencatat supplier</p>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="quantity" class="block text-sm/6 font-medium text-gray-900">User</label>
              <div class="mt-2">
                <input type="text" value="{{$stok->users->name}}" name="user_id" id="user_id" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>
          </div>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="quantity" class="block text-sm/6 font-medium text-gray-900">Nama Barang</label>



              <div class="mt-2">
                <input type="text" value="{{$stok->product->namaBarang}}" name="product_id" id="product_id" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>
          </div>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="nama" class="block text-sm/6 font-medium text-gray-900">Tipe</label>
              <div class="mt-2">
                    @php
                        $currentType = old('type', $data->type ?? '');
                    @endphp

                    <select id="type" name="type" class="...">
                        <option value="{{ $currentType }}" selected disabled>
                            {{ ucfirst($currentType) ?: 'Pilih Jenis Transaksi' }}
                        </option>

                        @foreach(['masuk', 'keluar'] as $type)
                            @if($type != $currentType)
                                <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                            @endif
                        @endforeach
                    </select>
              </div>
              @error('kategori')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="quantity" class="block text-sm/6 font-medium text-gray-900">Quantity</label>
                <div class="mt-2">
                  <input type="number" value="{{$stok->quantity}}" name="quantity" id="quantity" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
              </div>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Tanggal</label>
                <div class="mt-2">
                  <input type="date" name="date" id="date" value="{{$stok->date}}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
              </div>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="status" class="block text-sm/6 font-medium text-gray-900">Status</label>
                  <div class="mt-2">
                    <select id="status" name="status" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                       <option value="pending" {{ old('status', $data->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ old('status', $data->status ?? '') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ old('status', $data->status ?? '') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="dikeluarkan" {{ old('status', $data->status ?? '') == 'dikeluarkan' ? 'selected' : '' }}>Dikeluarkan</option>

                    </select>
                </div>
                </div>
              </div>
  
        </div>
        <div class="border-b border-gray-900/10 pb-12">
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
              <label for="alamat" class="block text-sm/6 font-medium text-gray-900">Note</label>
              <div class="mt-2">
                <textarea name="catatan" id="catatan" rows="4" placeholder="Opsional" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                  {{$stok->catatan}}</textarea>
              </div>
              <p class="mt-3 text-sm/6 text-gray-600">Opsional</p>
            </div>
          </div>
        </div>
  
  
  
      </div>
    
      <div class="mt-6 flex items-center justify-end gap-x-6 m-10">
        <button type="submit" class="btn btn-primary">
          Simpan
      </button>
        <button type="button" class="text-sm/6 font-semibold text-gray-900"><a href="/stok"> Cancel</a></button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>
    

@endsection