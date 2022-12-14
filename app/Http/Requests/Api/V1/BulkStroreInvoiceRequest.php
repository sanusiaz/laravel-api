<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStroreInvoiceRequest extends FormRequest
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
            '*.customer_id'   => ['required', 'integer'],
            '*.amount'        => ['required', 'numeric'],
            '*.status'        => ['required', Rule::in(['P', 'V', 'B', 'b', 'v', 'p'])],
            '*.billed_date'   => ['required', 'date-format:Y-m-d H:i:s'],
            '*.paidDate'     => ['date-format:Y-m-d H:i:s', 'nullable']
        ];
    }

    protected function prepareForValidation()
    {

        $data = [];

        // foreach( $this-> )
            
        $this->merge($data);
    }
}
