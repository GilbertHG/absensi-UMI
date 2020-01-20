<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MkStoreRequest extends FormRequest
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
            'dosen_mk'      => 'required',
            'kelas_mk'      => 'required',
            'hari_mk'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'dosen_mk.required' => 'Dosen Yang Mengajar Tidak Boleh Kosong.',
            'kelas_mk.required' => 'Kelas Mata Kuliah Tidak Boleh Kosong',
            'hari_mk.required'  => 'Hari Mata Kuliah Tidak Boleh Kosong',
        ];
    }
}