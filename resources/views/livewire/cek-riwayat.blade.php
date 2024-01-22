<div>
    @section('title', 'NUtrimet | Cek Riwayat')
    @section('riwayat_cek', 'font-bold')

    @include('layouts.nav')

    <div class="container mx-auto">
        <table class="table-auto mt-20 w-full">
            <thead>
                <tr class="bg-primary3 border-b-4 border-b-yellow-500">
                    <td class="text-xl p-5 rounded-tl-xl text-white w-1/2">Riwayat Cek <span class="font-bold"> : @if($kategori == "cek-status-gizi") Cek Status Gizi @elseif($kategori == "cek-pms")  Cek Pre-Metabolic Syndrome @else Silahkan pilih riwayat cek @endif</span></td>
                    <td class="px-5">
                        <select wire:model.live="kategori" class="bg-transparent border-2 border-white p-1 text-white rounded-lg float-end" name="kategori" id="kategori">
                            <option value="" disabled selected hidden>Pilih riwayat cek...</option>
                            <option value="cek-status-gizi" class="text-black">Cek Status Gizi</option>
                            <option value="cek-pms" class="text-black">Cek Pre-Metabolic Syndrome</option>
                        </select>
                    </td>
                    <td class="px-5">
                        <input wire:model.live="dateSearch" type="date" name="dateSearch" id="dateSearch" class="bg-transparent text-white border-2 border-white p-1 rounded-lg" placeholder="Cari tanggal periksa...">
                    </td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th class="border border-black p-5">Tanggal Periksa</th>
                    <th class="border border-black p-5">Hasil Periksa</th>
                    <th class="border border-black p-5">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $res)
                    <tr>
                        <td class="border border-black p-5">{{ date_format(new DateTime($res->tanggal_cek), "d F Y") }}</td>
                        <td class="border border-black p-5">@if($kategori == "cek-status-gizi") Status Gizi: @else Pre-Metabolic Syndrome: @endif <span class="font-medium">@if($kategori == "cek-status-gizi") {{ $res->hasil_status_gizi }} @else {{ $res->hasil_pms }} @endif</span></td>
                        <td class="border border-black p-5 w-1/4">
                            <a href="@if($kategori == 'cek-status-gizi') /cek_riwayat/status_gizi/{{ $res->id }} @else /cek_riwayat/cek_pms/{{ $res->id }} @endif" class="bg-yellow-600 px-3 py-2 mx-1 rounded-lg text-white text-xs">Detail</a>
                            <a href="#" class="bg-primary3 px-3 py-2 mx-1 rounded-lg text-white text-xs">Hapus</a>
                            <a href="#" class="bg-blue-950 px-3 py-2 mx-1 rounded-lg text-white text-xs">Cetak</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
