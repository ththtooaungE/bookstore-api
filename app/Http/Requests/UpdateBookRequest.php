<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
                'title' => ['required', 'max:255'],
                'condition' => ['nullable', Rule::in([1,2,3,4,5])],
                'description' => ['required'],
                'stock' => ['required','integer'],
                'price' => ['required', 'integer'],
                'authorId' => ['required', 'integer', 'exists:authors,id'],
                'language' => ['required', Rule::in(['English','Burmese','Korean','Chinese','Thai','Japanese','French'])],
                'page' =>['required', 'integer'],
                'publicationDate' => ['required', 'date_format:Y-m-d']
            ];
        } else {
            return [
                'title' => ['sometimes','required', 'max:255'],
                'condition' => ['sometimes','nullable', Rule::in([1,2,3,4,5])],
                'description' => ['sometimes','required'],
                'stock' => ['sometimes','required','integer'],
                'price' => ['sometimes','required', 'integer'],
                'authorId' => ['sometimes','required', 'integer', 'exists:authors,id'],
                'language' => ['sometimes','required', Rule::in(['English','Burmese','Korean','Chinese','Thai','Japanese','French'])],
                'page' =>['sometimes','required', 'integer'],
                'publicationDate' => ['sometimes','required', 'date_format:Y-m-d']
            ];
        }
    }
}
