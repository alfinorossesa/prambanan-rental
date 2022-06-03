<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class PaketWisataRequest extends FormRequest
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
            'kode_reservasi' => 'required',
            'tanggal_pemesanan' => 'required',
            'user_id' => 'required',
            'dataPaketWisata_id' => 'required',
            'tanggal_berangkat' => 'required'
        ];
    }
}
