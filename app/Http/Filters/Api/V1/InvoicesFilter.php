<?php

    namespace App\Http\Filters\Api\V1;
    use Illuminate\Http\Request;
    use App\Http\Filters\Api\ApiFilter;

    class InvoicesFilter extends ApiFilter {

        protected $safeParms = [
            'customerId' => ['eq', 'lte', 'lt', 'gt', 'gte', 'neq'],
            'amount' => ['eq', 'lte', 'lt', 'gt', 'gte', 'neq'],
            'billedDate' => ['eq', 'lte', 'lt', 'gt', 'gte', 'neq'],
            'paidDate' => ['eq', 'lte', 'lt', 'gt', 'gte', 'neq'],
            'status' => ['eq', 'neq']
        ];

        protected $columnMap = [
            'customerId' => 'customer_id',
            'billedDate' => 'billed_date', 
            'paidDate' => 'paidDate'
        ];
    }