<div>
    @section('title', 'NUtrimet | Cek Status Gizi')
    @section('cek_status_gizi', 'font-bold')

    @include('layouts.nav')

    <div class="container mx-auto">
        <div class="flex flex-wrap my-16 gap-7">
            <div class="flex-none ml-5 mx-auto">
                <div class="w-80 p-7 bg-white border border-gray-400 rounded-lg shadow hover:bg-gray-100 opacity-80">
                    <form action="/cek_status_gizi" method="post" wire:submit="cekStatusGizi">
                        <div class="mb-3">
                            <label for="tinggi_badan" class="block mb-2 text-base font-bold text-gray-900">Tinggi Badan (cm) <span class="text-primary3">*</span></label>
                            <input type="number" id="tinggi_badan" name="tinggi_badan" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan tinggi badan kamu..." value="" required autofocus wire:model="tinggi_badan">
                        </div>

                        <div class="mb-5">
                            <label for="berat_badan" class="block mb-2 text-base font-bold text-gray-900">Berat Badan (kg) <span class="text-primary3">*</span></label>
                            <input type="number" id="berat_badan" name="berat_badan" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan berat badan kamu..." value="" required wire:model="berat_badan">
                        </div>

                        <button type="submit" class="block mx-auto w-full py-3 bg-primary3 text-white font-bold text-xl rounded-xl">Cek Status Gizi</button>
                    </form>
                </div>
            </div>

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
                            <th class="text-xl">@if(session('afterCek')) {{ $cek_result->tinggi_badan }} @endif</th>
                        </tr>
                        <tr>
                            <td  class="pr-10 py-1 text-xl">Berat Badan:</td>
                            <th class="text-xl">@if(session('afterCek')) {{ $cek_result->berat_badan }} @endif</th>
                        </tr>
                    </table>
                    <h2 class="text-xl font-bold mb-5">Status Gizi Kamu: </h2>
                    <h1 class="text-3xl font-bold text-success">@if(session('afterCek')) {{ $cek_result->hasil_status_gizi }} @endif</h1>
                </div>
            </div>
        </div>
    </div>

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
</div>
