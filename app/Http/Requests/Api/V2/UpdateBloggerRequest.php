<?php

namespace App\Http\Requests\Api\V2;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBloggerRequest extends FormRequest
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
        $method = $this->method();

        if ( $method === "PUT" ) {

            return [
                'name' => ['required', 'string', 'max:255'],
                'title' => ['required', 'string', 'max:255'],
                'address' => ['required'],
                'salary'    => ['required', 'integer'],
                'status' => ['required', Rule::in(['A', 'B', 'D', 'V'])],
                'blockedDate' => ['nullable'],
                'deletedName' => ['nullable']
            ];
        }
        else {
            return [
                'name' => ['sometimes', 'string', 'max:255'],
                'title' => ['sometimes', 'string', 'max:255'],
                'address' => ['sometimes'],
                'salary'    => ['sometimes', 'integer'],
                'status' => ['sometimes', Rule::in(['A', 'B', 'D', 'V'])],
                'blockedDate' => ['sometimes', 'nullable'],
                'deletedName' => ['sometimes', 'nullable']
            ];
        }
    }

    public function prepareForVaidation() 
    {
        $this->merge([
            'blocked_date' => $this->blockedDate,
            'deleted_name' => $this->deletedName
        ]);
    }
}
