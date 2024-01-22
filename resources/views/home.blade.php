@extends('layouts.main')

@section('title', 'NUtrimet | Beranda')
@section('beranda', 'font-bold')

@section('contents')
    @include('layouts.nav')

    <div class="flex flex-wrap items-center bg-gradient-to-t from-pink-100 to-primary2 p-10 max-[420px]:text-center mb-14">
        <div class="flex-auto xl:ml-14">
            <img class="w-3/5 max-[420px]:w-1/2 max-[420px]:mx-auto" src="{{ asset('/img/ilustrasi-home.png') }}" alt="img home">
        </div>
        <div class="flex-auto xl:w-1/2">
            <h1 class="max-[420px]:text-xl xl:text-4xl font-bold mb-5">Selamat Datang, {{ auth()->user()->nama }}!</h1>
            <p class="max-[420px]:text-sm xl:text-base font-medium mb-7">Yuk cek status gizi kamu disini. Kamu juga bisa cek status pre-metabolic syndrom (PMS) juga lo.</p>
            <a class="px-6 py-3 bg-primary3 hover:bg-primary5 text-white font-bold max-[420px]:text-sm xl:text-xl rounded-xl mr-5 max-[420px]:mr-1" href="/cek_status_gizi">Cek Status Gizi</a>
            <a class="px-6 py-3 outline outline-3 hover:outline-none hover:bg-primary3 text-primary3 hover:text-white font-bold max-[420px]:text-sm xl:text-xl rounded-xl" href="/cek_pms">Cek Status PMS</a>
        </div>
    </div>

    <div class="flex flex-wrap justify-center lg:justify-around xl:justify-around mb-5">
        <div>
            <h3 class="text-xl text-left border-b-4 border-primary3 pb-3 font-bold">Grafik Perkembangan Status Gizi</h3>
            <canvas id="myChart"></canvas>
        </div>

        <div class="max-[420px]:hidden">
            <div class="lg:border-l-2 xl:border-l-2 lg:border-black xl:border-black lg:h-full xl:h-full"></div>
        </div>

        <div>
            <h3 class="text-xl text-left border-b-4 border-primary3 pb-3 font-bold">Grafik Perkembangan Pre-Metabolic Syndrome</h3>
            <canvas id="myChart2"></canvas>
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
@endsection

@if(session('login'))
    @section('scripts')
        <script>
            let timerInterval;

            Swal.fire({
                title: "Sukses!",
                icon: "success",
                html: "Kamu berhasil login, Selamat datang!",
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

@section('scripts')
    <script>
        const xValues = ["19 Januari 2024", "20 Januari 2024", "21 Januari 2024", "22 Januari 2024", "23 Januari 2024"];
        const yValues = [2, 3, 4, 3, 4];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor:"rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues
                }]
            }
        });
    </script>

<script>
        const xValues2 = ["19 Januari 2024", "20 Januari 2024", "21 Januari 2024", "22 Januari 2024", "23 Januari 2024"];
        const yValues2 = [1, 2, 2, 1, 2];

        new Chart("myChart2", {
            type: "line",
            data: {
                labels: xValues2,
                datasets: [{
                    backgroundColor:"rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues2
                }]
            }
        });
    </script>
@endsection