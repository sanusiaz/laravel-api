<?php

    namespace App\Http\Filters\Api\V2\Classes;

    use App\Http\Filters\Api\V2\ApiFilter;

    class BloggerFilter extends ApiFilter {
        protected $safeParms = [
            'name' => ['eq'],
            'salary' => ['eq', 'gt', 'lt', 'gte', 'lte'],
            'status' => ['eq', 'neq'],
            'title' => ['eq', 'neq'],
            'address' =>[ 'eq', 'neq'],
            'blockedDate' => ['eq', 'lte', 'gte']
        ];

        protected $columnMap = [
            'blockedDate' => 'blocked_date'
        ];

       
    }