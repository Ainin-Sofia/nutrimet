@extends('layouts.main')

@section('title', 'NUtrimet | Beranda')

@section('contents')
    @include('layouts.nav')

    <div class="flex flex-wrap items-center bg-gradient-to-t from-pink-100 to-primary2 p-10 max-[420px]:text-center mb-14">
        <div class="flex-auto xl:ml-14">
            <img class="w-3/5 max-[420px]:w-1/2 max-[420px]:mx-auto" src="{{ asset('/img/ilustrasi-home.png') }}" alt="img home">
        </div>
        <div class="flex-auto xl:w-1/2">
            <h1 class="max-[420px]:text-xl xl:text-4xl font-bold mb-5">Selamat Datang, Nanda Dwi Cahyo Wibowo!</h1>
            <p class="max-[420px]:text-sm xl:text-base font-medium mb-7">Yuk cek status gizi kamu disini. Kamu juga bisa cek status pre-metabolic syndrom (PMS) juga lo.</p>
            <a class="px-6 py-3 bg-primary3 hover:bg-primary5 text-white font-bold max-[420px]:text-sm xl:text-xl rounded-xl mr-5 max-[420px]:mr-1" href="/login">Cek Status Gizi</a>
            <a class="px-6 py-3 outline outline-3 hover:outline-none hover:bg-primary3 text-primary3 hover:text-white font-bold max-[420px]:text-sm xl:text-xl rounded-xl" href="/register">Cek Status PMS</a>
        </div>
    </div>

    <div class="flex flex-wrap justify-center lg:justify-around xl:justify-around">
        <div>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="py-5 text-xl text-left border-b-4 border-primary3" colspan="2">Riwayat Cek Status Gizi dalam 5 cek terakhir</th>
                    </tr>
                    <tr>
                        <th class="p-3 text-left border-b-2 border-t border-slate-600">Tanggal Periksa</th>
                        <th class="p-3 text-left border-b-2 border-t border-slate-600">Hasil Cek Status Gizi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2 text-left border-t border-b border-slate-600">06 Januari 2024</td>
                        <td class="p-2 text-left border-t border-b border-slate-600">Gizi Baik</td>
                    </tr>
                    <tr>
                        <td class="p-2 text-left border-t border-b border-slate-600">05 Januari 2024</td>
                        <td class="p-2 text-left border-t border-b border-slate-600">Gizi Cukup</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="max-[420px]:hidden">
            <div class="lg:border-l-2 xl:border-l-2 lg:border-black xl:border-black lg:h-full xl:h-full"></div>
        </div>

        <div>
        <table class="table-auto">
                <thead>
                    <tr>
                        <th class="py-5 text-xl text-left border-b-4 border-primary3" colspan="2">Riwayat Cek PMS dalam 5 cek terakhir</th>
                    </tr>
                    <tr>
                        <th class="p-3 text-left border-b-2 border-t border-slate-600">Tanggal Periksa</th>
                        <th class="p-3 text-left border-b-2 border-t border-slate-600">Hasil Cek Pre-Metabolic Syndrome</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2 text-left border-t border-b border-slate-600">06 Januari 2024</td>
                        <td class="p-2 text-left border-t border-b border-slate-600">Tidak Pre-Metabolic Syndrome</td>
                    </tr>
                    <tr>
                        <td class="p-2 text-left border-t border-b border-slate-600">05 Januari 2024</td>
                        <td class="p-2 text-left border-t border-b border-slate-600">Pre-Metabolic Syndrome</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function toggleNav() {
        var element = document.getElementById("navbar");
        element.classList.toggle("hidden");
    }

    function toggleUser() {
        var element = document.getElementById("user-menu");
        element.classList.toggle("hidden");
    }
</script>
@endsection