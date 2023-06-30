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
                'title' => ['required', 'max:255', 'unique:books,slug,'.$this->route('book')->id],
                'condition' => ['nullable', Rule::in([1,2,3,4,5])],
                'description' => ['required'],
                'stock' => ['required','integer'],
                'price' => ['required', 'integer'],
                'author_id' => ['required', 'integer', 'exists:authors,id'],
                'language' => ['required', Rule::in(['English','Burmese','Korean','Chinese','Thai','Japanese','French'])],
                'page' =>['required', 'integer'],
                'publication_date' => ['required', 'date_format:Y-m-d'],
                'genres' => ['required','max:5','array:0,1,2,3,4'],
                'genres.0' => ['exists:genres,id'],
                'genres.1' => ['exists:genres,id'],
                'genres.2' => ['exists:genres,id'],
                'genres.3' => ['exists:genres,id'],
                'genres.4' => ['exists:genres,id']
    
            ];
        } else {
            return [
                'title' => ['sometimes','required', 'max:255', 'unique:books,slug,'.$this->route('book')->id],
                'condition' => ['sometimes','nullable', Rule::in([1,2,3,4,5])],
                'description' => ['sometimes','required'],
                'stock' => ['sometimes','required','integer'],
                'price' => ['sometimes','required', 'integer'],
                'author_id' => ['sometimes','required', 'integer', 'exists:authors,id'],
                'language' => ['sometimes','required', Rule::in(['English','Burmese','Korean','Chinese','Thai','Japanese','French'])],
                'page' =>['sometimes','required', 'integer'],
                'publication_date' => ['sometimes','required', 'date_format:Y-m-d'],
                'genres' => ['sometimes','required','max:5','array:0,1,2,3,4'],
                'genres.0' => ['exists:genres,id'],
                'genres.1' => ['exists:genres,id'],
                'genres.2' => ['exists:genres,id'],
                'genres.3' => ['exists:genres,id'],
                'genres.4' => ['exists:genres,id']    
            ];
        }
    }
    
    protected function prepareForValidation()
    {
        $this->merge([
            'author_id' => $this->authorId,
            'publication_date' => $this->publicationDate
        ]);
    }
}
