<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreArticleRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Str::contains($this->contents, 'base64') ? dd($this->contents) : dd("Kok gak kenek??");
        // if (Str::contains($this->contents, 'base64')) {
        //     $base64 = Str::of(Str::of($this->contents)->explode('src="')[1])->explode('" ')[0];
        //     $this->contents = Str::of($this->contents)->replace($base64, '??');
        //     dd($base64, $this->contents);
        // }
        // $this->merge([]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         => 'required|unique:articles,title|max:50',
            'img'           => 'required|image',
            'contents'      => 'required|min:100',
            'category_id'   => 'required|integer|between:1,3',
        ];
    }
}
