@extends('layouts.main')

@section('title', 'NUtrimet | Masuk')

@section('contents')
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('/img/bg-red-dots.png');">
    <div class="block mx-auto my-28 max-w-lg p-7 bg-white border border-gray-400 rounded-lg shadow hover:bg-gray-100 opacity-80">
        <form action="/login" method="post">
            @csrf
            <img class="mx-auto w-72 mb-7" src="{{ asset('/img/Logo NUtrimet.png') }}" alt="NUtrimet Logo">
            <h2 class="text-xl text-center font-bold mb-3">Selamat Datang!</h2>
            <h3 class="text-sm text-center mb-5">Silahkan isi form dibawah ini untuk masuk</h3>

            <div class="mb-3">
                <label for="email" class="block mb-2 text-base font-medium text-gray-900">Alamat Email</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Apa alamat email kamu..." required>
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-base font-medium text-gray-900">Password</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Buat password akun kamu..." required>
            </div>

            <div class="mb-5 text-center">
                <a href="/" class="underline mr-11">Kembali ke halaman utama</a>
                <a href="/lupapassword" class="underline ml-11">Lupa Password?</a>
            </div>

            <button type="submit" class="block mx-auto w-full py-3 bg-primary3 text-white font-bold text-xl rounded-xl">Masuk</button>
        </form>
    </div>
</body>
@endsection