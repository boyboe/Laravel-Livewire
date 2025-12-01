<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee as ModelsEmployee;

class Employee extends Component
{

    public $nama;
    public $email;
    public $alamat;

    public function store (){
        $rules = [
            'nama'=> 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama wajib di isi !',
            'email.required' => 'Email wajib di isi !',
            'email.email' => 'Email wajib di isi !',
            'alamat.required' => 'Alamat wajib di isi !',
        ];
        $validated = $this->validate($rules, $pesan);
        ModelsEmployee::create($validated);
        session()->flash('message','Data berhasil dimasukan!');
    }

    public function render()
    {
        return view('livewire.employee');
    }
}
