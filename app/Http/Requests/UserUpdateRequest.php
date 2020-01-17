<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserUpdateRequest extends FormRequest
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
            'nim_mahasiswa' => 'unique:mahasiswa,nim_mahasiswa,'.\Request::instance()->id,
            'nip_nbm_dosen' => 'unique:dosen,nip_nbm_dosen,'.\Request::instance()->id,
        ];
    }

    public function messages()
    {
        return [
            'nip_nbm_dosen.unique' => 'NIP / NBM Sudah Ada Sebelumnya!',
            'nim_mahasiswa.unique' => 'NIM Sudah Ada Sebelumnya!',
        ];
    }
}