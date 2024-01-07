@extends('layouts.main')

@section('title', 'NUtrimet | Ubah Password')

@section('contents')
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('/img/bg-red-dots.png');">
    <div class="block mx-auto my-28 max-w-lg p-7 bg-white border border-gray-400 rounded-lg shadow hover:bg-gray-100 opacity-80">
        <form action="/password_baru" method="post">
            @csrf
            <img class="mx-auto w-72 mb-7" src="{{ asset('/img/Logo NUtrimet.png') }}" alt="NUtrimet Logo">
            <h2 class="text-xl text-center font-bold mb-3">Password Baru</h2>
            <h3 class="text-sm text-center mb-5">Masukkan Password Baru</h3>

            <div class="mb-3">
                <label for="password" class="block mb-2 text-base font-medium text-gray-900">Password Baru</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan password baru kamu..." required>
            </div>

            <input type="hidden" name="email" value="{{ $user_check[0]['email'] }}">

            <button type="submit" class="block mx-auto w-full py-3 bg-primary3 text-white font-bold text-xl rounded-xl">Ubah Password</button>
        </form>
    </div>
</body>
@endsection