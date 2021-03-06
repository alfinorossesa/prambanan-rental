<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataPaketWisataRequest extends FormRequest
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
            'nama_paket' => 'required',
            'tujuan' => 'required',
            'fasilitas' => 'required',
            'harga' => 'required|numeric|min:1',
            'deskripsi' => 'required'
        ];
    }
}
