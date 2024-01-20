@extends('layouts.main')

@section('title', 'NUtrimet | Daftar Akun')

@section('contents')
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('/img/bg-red-dots.png');">
    <div class="mx-auto my-5 max-w-lg p-7 bg-white border border-gray-400 rounded-lg shadow hover:bg-gray-100 opacity-80">
        <form action="/register" method="post">
            @csrf
            <img class="mx-auto w-72 mb-7" src="{{ asset('/img/Logo NUtrimet.png') }}" alt="NUtrimet Logo">
            <h2 class="text-xl text-center font-bold mb-3">Selamat Datang!</h2>
            <h3 class="text-sm text-center mb-5">Silahkan isi form dibawah ini untuk mendaftar</h3>

            <div class="mb-3">
                <label for="nama_lengkap" class="block mb-2 text-base font-medium text-gray-900">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Siapa nama lengkap kamu..." required value="{{ old('nama_lengkap') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="block mb-2 text-base font-medium text-gray-900">Alamat Email</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border @error('email') border-primary3 @enderror border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Apa alamat email kamu..." required value="{{ old('email') }}">
                @error('email')
                    <p class="text-primary3 text-xs mt-1">Email sudah pernah digunakan.</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="block mb-2 text-base font-medium text-gray-900">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="" disabled selected hidden>Apa jenis kelamin kamu...</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="block mb-2 text-base font-medium text-gray-900">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Kapan tanggal lahir kamu..." required value="{{ old('tanggal_lahir') }}">
                <p class="text-gray-500 text-xs mt-1">Pastikan kamu berusia antara 10 sampai 18 tahun.</p>
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-base font-medium text-gray-900">Password</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Buat password akun kamu..." required>
            </div>

            <div class="mb-5 text-center">
                <a href="/" class="underline">Kembali ke halaman utama</a>
            </div>

            <button type="submit" class="block mx-auto w-full py-3 bg-primary3 text-white font-bold text-xl rounded-xl">Daftar</button>
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