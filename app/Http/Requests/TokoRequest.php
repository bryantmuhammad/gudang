<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TokoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return match ($this->method()) {
            'POST' => $this->store(),
            'PUT'  => $this->update()
        };
    }

    public function store()
    {
        return [
            'nama_toko'         => ['required', 'max:50', 'unique:tokos,nama_toko'],
            'no_telepon_toko'   => ['required', 'numeric'],
            'alamat_toko'       => ['required', 'max:150']
        ];
    }


    public function update()
    {
        return [
            'nama_toko'         => ['required', 'max:50', Rule::unique('tokos')->ignore($this->toko->id)],
            'no_telepon_toko'   => ['required', 'numeric'],
            'alamat_toko'       => ['required', 'max:150']
        ];
    }
}
