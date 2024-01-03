@extends('layouts.main')

@section('title', 'Selamat Datang di Aplikasi NUtrimet')

@section('contents')
<body style="background-image: linear-gradient(to right, white, #D53955);">
    <div class="container mx-auto">
        <a href="/">
            <img class="w-40 mt-10 mb-20" src="{{ asset('/img/Logo NUtrimet.png') }}" alt="Logo NUtrimet">
        </a>

        <div class="flex justify-center items-center">
            <div class="flex-auto w-32 mr-48">
                <h1 class="text-4xl font-bold mb-5">NUtrimet</h1>
                <p class="text-base font-medium mb-7">NUtrimet bisa bantu kamu untuk cek status gizi loh! Yuk cari tau status gizi kamu, caranya cukup mudah.</p>
                <a class="px-6 py-3 bg-primary3 hover:bg-primary5 text-white font-bold text-xl rounded-xl mr-7" href="/login">Masuk</a>
                <a class="px-6 py-3 outline outline-3 hover:outline-none hover:bg-primary3 text-primary3 hover:text-white font-bold text-xl rounded-xl" href="/register">Daftar</a>
            </div>
            <div class="flex-auto w-64">
                <img class="w-auto" src="{{ asset('/img/ilustrasi-landing-page.png') }}" alt="Ilustrasi">
            </div>
        </div>
    </div>
</body>
@endsection