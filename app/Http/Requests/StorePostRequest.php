<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user_id == auth()->user()->id) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'title'         =>      'required',
            'slug'          =>      'required|unique:posts',
            'status'        =>      'required|in:1,2',
            'file'          =>      'image'
        ];

        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id'       =>      'required',
                'tags'              =>      'required',
                'excerpt'           =>      'required',
                'body'              =>      'required'
            ]);
        }

        return $rules;
    }
}
