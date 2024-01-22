<?php

namespace App\Livewire;

use App\Models\PreMetabolicSyndrome;
use App\Models\StatusGizi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CekRiwayat extends Component
{
    public $dateSearch = '';

    public $kategori = '';

    public $queryString = ['dateSearch' => ['except' => ''], 'kategori' => ['except' => '']];

    public function render()
    {
        $results = [];

        if ($this->kategori == "cek-status-gizi") {
            $results = StatusGizi::where('user_id', '=', Auth::user()->id)->orderBy('tanggal_cek', 'desc')->get();
            if ($this->dateSearch != "") {
                $results = StatusGizi::where('user_id', '=', Auth::user()->id)->where('tanggal_cek', '=', $this->dateSearch)->orderBy('tanggal_cek', 'desc')->get();
            }
        } else if ($this->kategori == "cek-pms") {
            $results = PreMetabolicSyndrome::where('user_id', '=', Auth::user()->id)->orderBy('tanggal_cek', 'desc')->get();
            if ($this->dateSearch != "") {
                $results = PreMetabolicSyndrome::where('user_id', '=', Auth::user()->id)->where('tanggal_cek', '=', $this->dateSearch)->orderBy('tanggal_cek', 'desc')->get();
            }
        }
        return view('livewire.cek-riwayat', compact('results'));
    }
}
