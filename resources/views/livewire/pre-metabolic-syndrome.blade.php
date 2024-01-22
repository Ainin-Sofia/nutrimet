<div>
    @section('title', 'NUtrimet | Cek Pre Metabolic Syndrome')
    @section('cek_pms', 'font-bold')

    @include('layouts.nav')

    <div class="container mx-auto">
        <div class="flex flex-wrap my-16 gap-7">
            <div class="flex-none ml-5 mx-auto">
                <div class="w-80 p-7 bg-white border border-gray-400 rounded-lg shadow hover:bg-gray-100 opacity-80">
                    <form action="/cek_pms" method="post" wire:submit="cekPMS">
                        <div class="mb-3">
                            <label for="tekanan_darah" class="block mb-2 text-base font-bold text-gray-900">Tekanan Darah <span class="text-primary3">*</span></label>
                            <div class="flex gap-5">
                                <input type="number" id="sistole" name="sistole" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5" placeholder="Sistole" value="" required autofocus wire:model="sistole">
                                <input type="number" id="tekanan_darah" name="tekanan_darah" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5" placeholder="Diastole" value="" required autofocus wire:model="diastole">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="lingkar_pinggang" class="block mb-2 text-base font-bold text-gray-900">Lingkar Pinggang <span class="text-primary3">*</span></label>
                            <input type="number" id="lingkar_pinggang" name="lingkar_pinggang" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan lingkar pinggang kamu..." value="" required autofocus wire:model="lingkar_pinggang">
                        </div>

                        <div class="mb-3">
                            <label for="gula_darah" class="block mb-2 text-base font-bold text-gray-900">Gula Darah <span class="text-primary3">*</span></label>
                            <input type="number" id="gula_darah" name="gula_darah" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan tinggi badan kamu..." value="" required autofocus wire:model="gula_darah">
                        </div>

                        <div class="mb-3">
                            <label for="hdl" class="block mb-2 text-base font-bold text-gray-900">HDL (opsional) </label>
                            <input type="number" id="hdl" name="hdl" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan hdl kamu..." value="" required autofocus wire:model="hdl">
                        </div>

                        <div class="mb-5">
                            <label for="trigliserida" class="block mb-2 text-base font-bold text-gray-900">Trigliserida (opsional) </label>
                            <input type="number" id="trigliserida" name="trigliserida" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan trigliserida kamu..." value="" required wire:model="trigliserida">
                        </div>

                        <button type="submit" class="block mx-auto w-full py-3 bg-primary3 text-white font-bold text-xl rounded-xl">Cek PMS</button>
                    </form>
                </div>
            </div>

            <div class="flex-auto ml-5 mr-12">
                <div class="p-7 bg-white border border-gray-400 rounded-lg shadow hover:bg-gray-100 opacity-80">
                    <h2 class="text-xl font-bold mb-3 max-[551px]:float-start">Data Riwayat Cek <span class="float-end max-[551px]:float-start max-[551px]:block text-base">Tanggal Cek: @if(session('afterCek')) {{ date_format(new DateTime($cek_result->tanggal_cek), "d F Y") }} @endif</span></h2>
                    <hr class="border-black max-[551px]:hidden">
                    <h2 class="mt-3 mb-7 text-xl font-bold">Halo, {{ auth()->user()->nama }}!</h2>
                    <p class="text-xl font-medium">Berikut adalah hasil Cek Pre Metabolic Syndrome:</p>
                    <table class="table-auto text-left my-10">
                        <tr>
                            <td class="pr-10 py-1 text-xl">Usia:</td>
                            <th class="text-xl">@if(session('afterCek')) {{ $thn . " tahun "}} @endif</th>
                        </tr>
                        <tr>
                            <td class="pr-10 py-1 text-xl">Tekanan Darah:</td>
                            <th class="text-xl">@if(session('afterCek')) {{ $cek_result->sistole ."/" . $cek_result->diastole . " mmHg" }} @endif</th>
                        </tr>
                        <tr>
                            <td class="pr-10 py-1 text-xl">Lingkar Pinggang:</td>
                            <th class="text-xl">@if(session('afterCek')) {{ $cek_result->lingkar_pinggang . " cm"}} @endif</th>
                        </tr>
                        <tr>
                            <td class="pr-10 py-1 text-xl">Gula Darah:</td>
                            <th class="text-xl">@if(session('afterCek')) {{ $cek_result->gula_darah . " mg/dl"}} @endif</th>
                        </tr>
                        <tr>
                            <td class="pr-10 py-1 text-xl">HDL:</td>
                            <th class="text-xl">@if(session('afterCek')) {{ $cek_result->hdl . " mg/dl"}} @endif</th>
                        </tr>
                        <tr>
                            <td class="pr-10 py-1 text-xl">Trigliserida:</td>
                            <th class="text-xl">@if(session('afterCek')) {{ $cek_result->trigliserida . " mg/dl"}} @endif</th>
                        </tr>
                    </table>
                    <h2 class="text-xl font-bold mb-5">Status PMS Kamu: </h2>
                    <h1 class="text-3xl font-bold text-success">@if(session('afterCek')) {{ $cek_result->hasil_pms }} @endif</h1>
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