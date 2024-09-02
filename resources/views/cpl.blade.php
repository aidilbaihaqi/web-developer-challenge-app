@extends('layout.master')

@section('content')

<body class="bg-blue-50 p-6">
  <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-4">
      <h1 class="text-center text-xl font-bold mb-4">Laman CPL</h1>
      
      @if (session('success'))
      <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
          Berhasil! {{ session('success') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
      </div>
      @endif

      <table class="min-w-full bg-white border border-gray-300">
          <thead class="bg-blue-200">
              <tr>
                  <th class="border px-4 py-2 text-left">No</th>
                  <th class="border px-4 py-2 text-left">Kode CPL</th>
                  <th class="border px-4 py-2 text-left">Deskripsi CPL</th>
                  <th class="border px-4 py-2 text-left">Aksi</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($data['cpl'] as $item)
                <tr>
                    <td class="border px-4 py-2s">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $item['kodecpl'] }}</td>
                    <td class="border px-4 py-2">{{ $item['deskripsi'] }}</td>
                    <td class="border px-4 py-2">
                        <a href="" class="text-blue-500">Edit</a>
                        <a href="" class="text-red-500">Hapus</a>
                        
                    </td>
                </tr>   
              @endforeach

              {{-- Row Input Data --}}
              <form action="{{ route('cpl.store') }}" method="POST" id="form-data">
                    @csrf
                    <td class="border px-4 py-2">Tambah Data : </td>
                    <td class="border px-4 py-2">
                        <input type="text" name="kodecpl" id="kodecpl">
                    </td>
                    <td class="border px-4 py-2">
                        <input type="text" name="deskripsi" id="deskripsi">
                    </td>
                    <button type="submit" id="submitBtn" style="display: none;"></button>
                </form>
          </tbody>
      </table>
      <footer class="mt-4 text-right text-xs text-gray-600">FTTK UMRAH 2024</footer>
  </div>

  <script>
    document.getElementById('submitBtn').addEventListener('keydown', function(event) {
        if(event.key === 'Enter') {
            event.preventDefault();
            document.getElementById('form-data').submit();
        }
    });
  </script>
</body>

@endsection