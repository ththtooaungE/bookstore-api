<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'max:255', 'unique:books,slug'],
            'condition' => ['nullable', Rule::in([1,2,3,4,5])],
            'description' => ['required'],
            'stock' => ['required','integer'],
            'price' => ['required', 'integer'],
            'authorId' => ['required', 'integer', 'exists:authors,id'], //'author_id' or 'authorId' doesn't matter because merge() doesn't overwrite ,and add a new key.
            'language' => ['required', Rule::in(['English','Burmese','Korean','Chinese','Thai','Japanese','French'])],
            'page' =>['required', 'integer'],
            'publicationDate' => ['required', 'date_format:Y-m-d'],
            'genres' => ['required','max:5','array:0,1,2,3,4'],
            'genres.0' => ['exists:genres,id'],
            'genres.1' => ['exists:genres,id'],
            'genres.2' => ['exists:genres,id'],
            'genres.3' => ['exists:genres,id'],
            'genres.4' => ['exists:genres,id']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'author_id' => $this->authorId,
            'publication_date' => $this->publicationDate
        ]);
    }
}
