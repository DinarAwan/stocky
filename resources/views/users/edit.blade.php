@extends('example.layouts.default.dashboardAdmin')
@section('content')

<form method="post" action="{{$data->id}}"> 
    
    @csrf
      <div class="space-y-12 p-12">
  
    
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base/7 font-semibold text-gray-900">Penambahan </h2>
          <p class="mt-1 text-sm/6 text-gray-600">Isi form dibawah untuk mencatat supplier</p>
          
        
         
            
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="status" class="block text-sm/6 font-medium text-gray-900">Ubah Role</label>
                  <div class="mt-2">
                    <select id="role" name="role" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                       <option value="staf_gudang" {{ old('role', $data->role ?? '') == 'staf_gudang' ? 'selected' : '' }}>Staf Gudang</option>
                        <option value="manager_gudang" {{ old('role', $data->role ?? '') == 'manager_gudang' ? 'selected' : '' }}>Manager Gudang</option>
                        

                    </select>
                </div>
                </div>
              </div>
  
        </div>
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6 m-10">
        <button type="submit" class="btn btn-primary">
          Simpan
      </button>
        <button type="button" class="text-sm/6 font-semibold text-gray-900"><a href="/users"> Cancel</a></button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>

@endsection