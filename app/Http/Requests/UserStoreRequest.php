<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'foto' => 'required_with:nim_mahasiswa|image|mimes:jpeg,png,jpg|max:2048',
            'nim_mahasiswa' => 'unique:mahasiswa,nim_mahasiswa',
            'nip_nbm_dosen' => 'unique:dosen,nip_nbm_dosen',
            'tahun_ajaran'  => 'unique:tahun_ajaran,tahun_ajaran',
            'kepada'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nip_nbm_dosen.unique' => 'NIP / NBM Sudah Ada Sebelumnya!',
            'nim_mahasiswa.unique' => 'NIM Sudah Ada Sebelumnya!',
            'foto.required_with' => 'Harap Masukan Foto!',
            'foto.mimes' => 'Format Foto Anda Salah!',
            'foto.max' => 'Ukuran Foto Terlalu Besar!',
            'tahun_ajaran.unique' => 'Tahun Ajaran Telah Ada',
            'kepada.required' => 'Tujuan Pesan Tidak Boleh Kosong.',
        ];
    }
}
