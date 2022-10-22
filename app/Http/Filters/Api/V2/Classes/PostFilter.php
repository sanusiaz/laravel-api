<?php

    namespace App\Http\Filters\Api\V2\Classes;

    use App\Http\Filters\Api\V2\ApiFilter;

    class PostFilter extends ApiFilter {
        protected $safeParms = [
            'slug' => ['eq'],
            'bloggerId' => ['eq', 'gt', 'lt', 'neq', 'gte'],
            'title' => ['eq', 'neq'],
            'body' =>[ 'eq', 'neq'],
            'author' =>[ 'eq', 'neq'],
            'featuredImage' => ['eq', 'lte', 'gte']
        ];

        protected $columnMap = [
            'featuredImage' => 'featured_image',
            'bloggerId' => 'blogger_id'
        ];
    }