<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
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
            'PUT' => $this->update()
        };
    }

    public function store()
    {
        return [
            'nama_supplier'         => ['required', 'max:50', 'unique:suppliers,nama_supplier'],
            'no_telepon_supplier'   => ['required', 'numeric'],
            'alamat_supplier'       => ['required', 'max:150']
        ];
    }


    public function update()
    {
        return [
            'nama_supplier'         => ['required', 'max:50'],
            'no_telepon_supplier'   => ['required', 'numeric'],
            'alamat_supplier'       => ['required', 'max:150']
        ];
    }
}
