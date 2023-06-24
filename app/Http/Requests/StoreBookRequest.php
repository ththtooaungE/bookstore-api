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
            'condition' => ['nullable', Rule::in([1,2,3,4,5])],
            'description' => ['required'],
            'stock' => ['required','integer'],
            'price' => ['required', 'integer'],
            'authorId' => ['required', 'integer', 'exists:authors,id'],
            'language' => ['required', Rule::in(['English','Burmese','Korean','Chinese','Thai','Japanese','French'])],
            'page' =>['required', 'integer'],
            'publicationDate' => ['required', 'date_format:Y-m-d']
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
