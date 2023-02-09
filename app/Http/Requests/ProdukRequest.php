<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
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
            'nama_produk'   => ['required', 'max:60'],
            'harga'         => ['required', 'numeric'],
            'harga_beli'    => ['required', 'numeric'],
            'deskripsi'     => ['required'],
            'id_kategori'   => ['required', 'exists:kategoris,id_kategori'],
            'foto'          => ['required', 'image', 'file', 'max:10240']
        ];
    }

    public function update()
    {
        return [
            'nama_produk'   => ['required', 'max:60'],
            'harga'         => ['required', 'numeric'],
            'harga_beli'    => ['required', 'numeric'],
            'deskripsi'     => ['required'],
            'id_kategori'   => ['required', 'exists:kategoris,id_kategori'],
            'foto'          => ['nullable', 'image', 'file', 'max:10240']
        ];
    }
}
