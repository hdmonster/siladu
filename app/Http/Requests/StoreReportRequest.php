<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            'code' => 'required',
            'nama_pelapor' => 'required',
            'no_hp' => 'required',
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'nama_ortu' => 'required',
            'kronologis' => 'required',
            'jenis_laporan' => 'required'
        ];
    }
}
