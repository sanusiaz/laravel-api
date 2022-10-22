<?php

namespace App\Http\Requests\Api\V2;

use Illuminate\Foundation\Http\FormRequest;

class BulkStorePostRequest extends FormRequest
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
            '*.bloggerId' => ['required', 'integer'],
            '*.slug' => ['required', 'string'],
            '*.featuredImage' => ['required'],
            '*.title' => ['required', 'string'],
            '*.body' => ['required'],
            '*.author' => ['required', 'string']
        ];
    }

    public function pepareForValidation() {
        $data = [];
        foreach( $this->toArray() as $obj ) {
            $obj['blogger_id'] = $obj['bloggerId'];
            $obj['featured_image'] = $obj['featuredImage'];

            $data[] = $obj;
        }
        $this->merge($data);
    }
}
