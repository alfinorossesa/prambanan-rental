<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class KendaraanRequest extends FormRequest
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
            'merk_id' => 'required',
            'no_polisi' => 'required',
            'no_mesin' => 'required',
            'no_rangka' => 'required',
            'tipe' => 'required',
            'kategori' => 'required',
            'kapasitas_penumpang' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'jenis_bbm' => 'required',
            'kapasitas_bbm' => 'required'
        ];
    }
}
