<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class SewaMobilRequest extends FormRequest
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
            'tanggal_peminjaman' => 'required',
            'jam_peminjaman' => 'required',
            'kartu_identitas' => 'required',
            'nik' => 'required',
            'jaminan' => 'required',
            'bbm' => 'required',
            'durasi_peminjaman' => 'required'
        ];
    }
}
