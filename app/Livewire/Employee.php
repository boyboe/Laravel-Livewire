<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee as ModelsEmployee;
use Livewire\WithPagination;


class Employee extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
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
        $data = ModelsEmployee::orderBy('nama', 'asc')->paginate(2);
        return view('livewire.employee', ['dataEmployees'=>$data]);
    }
}
