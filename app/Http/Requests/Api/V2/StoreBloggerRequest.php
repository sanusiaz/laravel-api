<?php

namespace App\Http\Requests\Api\V2;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBloggerRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'address' => ['sometimes', 'required'],
            'salary'    => ['required', 'integer'],
            'status' => ['required', Rule::in(['A', 'B', 'D', 'V'])],
            'blockedDate' => ['sometimes', 'nullable'],
            'deletedName' => ['sometimes', 'nullable']
        ];
    }

    protected function prepareForVaidation()
    {
        $this->merge([
            'blocked_date' => $this->blockedDate,
            'deleted_name' => $this->deletedName
        ]);
    }
}
