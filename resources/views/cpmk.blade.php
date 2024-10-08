@extends('layout.master')

@section('content')

<body class="bg-blue-50 p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-4">
        <h1 class="text-center text-xl font-bold mb-4">Laman CPMK</h1>

        @if (session('success'))
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                Berhasil! {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode CPMK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode CPL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($data['cpmk'] as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item['kodecpmk'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item['kodecpl'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item['deskripsi'] }}
                        </td>
                        @if (Session::get('userRights')->contains('editCPL'))
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                        </td>
                        @endif
                    </tr>
                  @endforeach
                  {{-- Row Input Data --}}
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <form action="{{ route('cpmk.store') }}" method="POST" id="form-data">
                        @csrf
                        <td class="border px-4 py-2">Tambah Data : </td>
                        <td class="border px-4 py-2">
                            <input type="text" name="kodecpmk" id="kodecpmk">
                        </td>
                        <td class="border px-4 py-2">
                            <select name="kodecpl" id="states" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-e-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Kode CPL</option>
                                @foreach ($kodecpl['cpl'] as $item)
                                    <option value="{{ $item['kodecpl'] }}">{{ $item['kodecpl'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="border px-4 py-2">
                            <input type="text" name="deskripsi" id="deskripsi">
                        </td>
                        <td class="border px-4 py-2"></td>
                        <button type="submit" id="submitBtn" style="display: none;"></button>
                    </form>
                  </tr>
                </tbody>
            </table>
        </div>
        <footer class="mt-4 text-right text-xs text-gray-600">FTTK UMRAH 2024</footer>
    </div>

    <script>
        document.getElementById('submitBtn').addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                document.getElementById('form-data').submit();
            }
        });
    </script>
</body>

@endsection