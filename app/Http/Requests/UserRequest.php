<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UserRequest extends FormRequest
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
            'name'      => ['required', 'max:255'],
            'email'     => ['required', 'email:dns', 'unique:users,email'],
            'password'  => ['required', 'confirmed'],
            'role'      => ['required', 'numeric']
        ];
    }


    public function update()
    {
        return [
            'name'      => ['required', 'max:255'],
            'email'     => ['required', 'email:dns', Rule::unique('users', 'email')->ignore($this->user->id)],
            'password'  => ['nullable', 'confirmed'],
            'role'      => ['required', 'numeric']
        ];
    }
}
