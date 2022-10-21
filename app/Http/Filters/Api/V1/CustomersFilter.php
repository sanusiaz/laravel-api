<?php

    namespace App\Http\Filters\Api\V1;
    use Illuminate\Http\Request;
    use App\Http\Filters\Api\ApiFilter;

    class CustomersFilter extends ApiFilter {
        
        protected $safeParms = [
            'name' => ['eq', 'neq'],
            'type' => ['eq', 'neq'],
            'email' => ['eq', 'neq'],
            'address' => ['eq', 'neq'],
            'city' => ['eq', 'neq'],
            'state' => ['eq', 'neq'],
            'postalCode' => ['eq', 'lte', 'lt', 'gt', 'gte', 'neq']
        ];

        protected $columnMap = [
            'postalCode' => 'postal_code'
        ];
    }