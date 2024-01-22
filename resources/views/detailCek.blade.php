@extends('layouts.main')

@section('title', 'NUtrimet | Beranda')
@section('beranda', 'font-bold')

@section('contents')
    @include('layouts.nav')
        <div class="flex-auto ml-5 mr-12">
            <div class="p-7 bg-white border border-gray-400 rounded-lg shadow hover:bg-gray-100 opacity-80">
                <h2 class="text-xl font-bold mb-3 max-[551px]:float-start">Data Riwayat Cek <span class="float-end max-[551px]:float-start max-[551px]:block text-base">Tanggal Cek: @if(session('afterCek')) {{ date_format(new DateTime($cek_result->tanggal_cek), "d F Y") }} @endif</span></h2>
                <hr class="border-black max-[551px]:hidden">
                <h2 class="mt-3 mb-7 text-xl font-bold">Halo, {{ auth()->user()->nama }}!</h2>
                <p class="text-xl font-medium">Berikut adalah hasil Cek Status Gizi kamu:</p>
                <table class="table-auto text-left my-10">
                    <tr>
                        <td  class="pr-10 py-1 text-xl">Usia:</td>
                        <th class="text-xl">@if(session('afterCek')) {{ $thn . " tahun " . $bln . " bulan" }} @endif</th>
                    </tr>
                    <tr>
                        <td  class="pr-10 py-1 text-xl">Tinggi Badan:</td>
                        <th class="text-xl">@if(session('afterCek')) {{ $cek_result->tinggi_badan }} cm @endif</th>
                    </tr>
                    <tr>
                        <td  class="pr-10 py-1 text-xl">Berat Badan:</td>
                        <th class="text-xl">@if(session('afterCek')) {{ $cek_result->berat_badan }} kg @endif</th>
                    </tr>
                </table>
                <h2 class="text-xl font-bold mb-5">Status Gizi Kamu: </h2>
                <h1 class="text-3xl font-bold text-success">@if(session('afterCek')) {{ $cek_result->hasil_status_gizi }} @endif</h1>
            </div>
        </div>
@endsection