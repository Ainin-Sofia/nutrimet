@extends('layouts.main')

@section('title', 'NUtrimet | Pengaturan Akun')

@section('contents')
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('/img/bg-red-dots.png');">
    <div class="mx-auto my-16 max-w-lg p-7 bg-white border border-gray-400 rounded-lg shadow hover:bg-gray-100 opacity-80">
        <form action="/pengaturan_akun" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="text-xl text-center font-bold mb-3">Pengaturan Akun</h2>
            <h3 class="text-sm text-center mb-5">Silahkan isi form dibawah ini untuk merubah pengaturan akun</h3>

            <img src="@if(auth()->user()->gambar != '') {{ asset('/storage/profile_picture/' . auth()->user()->gambar) }} @else {{ asset('/img/defaultPP.png') }} @endif" alt="User Icon" class="w-20 mx-auto">

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <input class="w-full p-3 mt-5 mb-3 border border-black rounded-lg cursor-pointer @error('profile_picture') border-primary3 @enderror" type="file" name="profile_picture" id="profile_picture">
            @error('profile_picture')
                <p class="text-primary3 text-xs">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label for="nama_lengkap" class="block mb-2 text-base font-medium text-gray-900">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Siapa nama lengkap kamu..." required value="{{ $authenticatedUser->nama }}">
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="block mb-2 text-base font-medium text-gray-900">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Kapan tanggal lahir kamu..." required value="{{ $authenticatedUser->tanggal_lahir }}">
                <p class="text-gray-500 text-xs mt-1">Pastikan kamu berusia antara 10 sampai 18 tahun.</p>
            </div>

            <div class="mb-5 text-center">
                <a href="/" class="underline">Kembali ke halaman utama</a>
            </div>

            <button type="submit" class="block mx-auto w-full py-3 bg-primary3 text-white font-bold text-xl rounded-xl">Simpan Perubahan</button>
        </form>
    </div>
</body>
@endsection

@if(session('status'))
    @section('scripts')
        <script>
            let timerInterval;

            Swal.fire({
                title: "Gagal!",
                icon: "error",
                html: "Akun kamu tidak dapat dibuat karena jarak usia 10 - 18 tahun.",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.hideLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("Alert ditutup.");
                }
            });
        </script>
    @endsection
@endif