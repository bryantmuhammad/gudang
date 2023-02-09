<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KategoriRequest extends FormRequest
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
            'nama_kategori' => ['required', 'max:50', 'unique:kategoris,nama_kategori']
        ];
    }

    public function update()
    {
        return [
            'nama_kategori' => ['required', 'max:50']
        ];
    }
}
