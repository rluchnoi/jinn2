<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilmUploadRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'year'     => ['required', 'digits:4'],
            'actors'   => ['required', 'array'],
            'actors.*' => ['integer', 'exists:actors,id'],
            'director' => ['required', 'integer', 'exists:directors,id'],
            'video'    => ['required', 'mimes:mp4'],
            'image'    => ['required', 'mimes:jpg,png,jpeg']
        ];
    }
}
