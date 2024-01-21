<?php

namespace App\Livewire;

use App\Models\StandartIMTL;
use App\Models\StandartIMTP;
use App\Models\StatusGizi as ModelsStatusGizi;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StatusGizi extends Component
{
    public $tinggi_badan = '';
    public $berat_badan = '';
    public $cek_result;
    public $thn;
    public $bln;

    public function cekStatusGizi() {
        $tanggal_lahir = new DateTime(Auth::user()->tanggal_lahir);
        $sekarang = new DateTime("today");

        if ($tanggal_lahir > $sekarang) { 
            $this->thn = "0";
            $this->bln = "0";
        }

        $this->thn = $sekarang->diff($tanggal_lahir)->y;
        $this->bln = $sekarang->diff($tanggal_lahir)->m;
        
        date_default_timezone_set('Asia/Jakarta');

        $imt = $this->berat_badan / pow(($this->tinggi_badan / 100), 2);

        if (Auth::user()->jenis_kelamin == "Laki-Laki") {
            $getByAge = StandartIMTL::where('umur_tahun', '=', $this->thn)->where('umur_bulan', '=', $this->bln)->get();
        } else {
            $getByAge = StandartIMTP::where('umur_tahun', '=', $this->thn)->where('umur_bulan', '=', $this->bln)->get();
        }

        if ($imt < $getByAge[0]["median"]) {
            $z_score = ($imt - $getByAge[0]["median"]) / ($getByAge[0]["median"] - $getByAge[0]["min_satu_sd"]);
        } else {
            $z_score = ($imt - $getByAge[0]["median"]) / ($getByAge[0]["plus_satu_sd"] - $getByAge[0]["median"]);
        }

        if ($z_score < -3.0) {
            $gizi = "Gizi Kurang (thinnnes)";
        } else if ($z_score >= -3.0 && $z_score < -2.0) {
            $gizi = "Gizi Kurang (thinnnes)";
        } else if ($z_score >= -2.0 && $z_score < 1.0) {
            $gizi = "Gizi Baik (normal)";
        } else if ($z_score >= 1.0 && $z_score <= 2.0) {
            $gizi = "Gizi Lebih (overweight)";
        } else if ($z_score > 2.0) {
            $gizi = "Obesitas (obese)";
        } else {
            $gizi = "Gizi Tidak Diketahui";
        }

        $this->cek_result = ModelsStatusGizi::create([
            'user_id' => Auth::user()->id,
            'tanggal_cek' => date("Y-m-d"),
            'tinggi_badan' => $this->tinggi_badan,  
            'berat_badan' => $this->berat_badan,
            'imt' => $imt,
            'hasil_status_gizi' => $gizi,
            'z_score' => $z_score
        ]);

        return redirect()->back()->with('afterCek', 'Success');
    }

    public function render()
    {
        return view('livewire.status-gizi');
    }
}
