<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateGenreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(Request $request): array
    {
        if($request->method() == "PUT") {
            return [
                'name' => 'required|max:255|string|unique:genres,name,'.$this->route('genre')->id,
                'slug' => 'required|max:255|string|unique:genres,slug,'.$this->route('genre')->id
            ];
        } else {
            return [
                'name' => 'sometimes|required|max:255|string|unique:genres,name,'.$this->route('genre')->id,
                'slug' => 'sometimes|required|max:255|string|unique:genres,slug,'.$this->route('genre')->id
            ];
        }
    }
}
