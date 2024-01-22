<?php

namespace App\Livewire;

use App\Models\PreMetabolicSyndrome as ModelsPreMetabolicSyndrome;
use App\Models\StandartLPL;
use App\Models\StandartLPP;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PreMetabolicSyndrome extends Component
{
    public $sistole = '';
    public $diastole = '';
    public $lingkar_pinggang = '';
    public $gula_darah = '';
    public $hdl = '';
    public $trigliserida = '';
    public $cek_result;
    public $thn;

    public function cekPMS()
    {
        $tanggal_lahir = new DateTime(Auth::user()->tanggal_lahir);
        $sekarang = new DateTime("today");

        if ($tanggal_lahir > $sekarang) {
            $this->thn = "0";
        }

        $this->thn = $sekarang->diff($tanggal_lahir)->y;

        date_default_timezone_set('Asia/Jakarta');

        if (auth()->user()->jenis_kelamin == "Laki-Laki") {
            $slp = StandartLPL::where('umur_tahun', '=', $this->thn)->get();
        } else {
            $slp = StandartLPP::where('umur_tahun', '=', $this->thn)->get();
        }

        if ($this->sistole >= 130 || $this->diastole >= 80) {
            $pms = "Pre-Metabolic Syndrome";
        } else {
            if ($this->lingkar_pinggang > $slp[0]["lingkar_pinggang"]) {
                $pms = "Pre-Metabolic Syndrome";
            } else {
                if ($this->gula_darah >= 100) {
                    $pms = "Pre-Metabolic Syndrome";
                } else {
                    if ($this->hdl <= 40) {
                        $pms = "Pre-Metabolic Syndrome";
                    } else {
                        if ($this->trigliserida >= 110) {
                            $pms = "Pre-Metabolic Syndrome";
                        } else {
                            $pms = "Tidak Pre-Metabolic Syndrome";
                        }
                    }
                }
            }
        }



        $this->cek_result = ModelsPreMetabolicSyndrome::create([
            'user_id' => Auth::user()->id,
            'tanggal_cek' => date("Y-m-d"),
            'sistole' => $this->sistole,
            'diastole' => $this->diastole,
            'lingkar_pinggang' => $this->lingkar_pinggang,
            'gula_darah' => $this->gula_darah,
            'hdl' => $this->hdl,
            'trigliserida' => $this->trigliserida,
            'hasil_pms' => $pms
        ]);

        return redirect()->back()->with('afterCek', 'Success');
    }
    public function render()
    {
        return view('livewire.pre-metabolic-syndrome');
    }
}
