<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsenRequest extends FormRequest
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
            'id_mk'             => 'required',
            'pertemuan'         => 'required',
            'id_mahasiswa'      => 'required',
            'status.*'          => 'required',
            'tanggal_kuliah'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pertemuan.required'         => 'Pertemuan Harus Terisi!',
            'status.*.required'            => 'Status Kehadiran Harus Terisi!',
            'tanggal_kuliah.required'    => 'Tanggal Perkuliahan Kehadiran Harus Terisi!',
        ];
    }
}
