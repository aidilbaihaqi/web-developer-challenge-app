@extends('layout.master')

@section('content')

<body class="bg-blue-50 p-6">
  <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-4">
      <h1 class="text-center text-xl font-bold mb-4">Laman CPL</h1>
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
          </tbody>
      </table>
      <footer class="mt-4 text-right text-xs text-gray-600">FTTK UMRAH 2024</footer>
  </div>
</body>

@endsection