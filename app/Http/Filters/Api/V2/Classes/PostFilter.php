<?php

    namespace App\Http\Filters\Api\V2\Classes;
    use Illuminate\Http\Request;

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

        protected $operatorMap = [
            'eq' => '=',
            'neq' => '!=',
            'gt' => '>',
            'lt' => '<',
            'lte' => '<=',
            'gte' => '>='
        ];


        public function transform( Request $request ) {
            $eloQuery = [];

            foreach ( $this->safeParms as $parms => $operators ) {
                $query = $request->query($parms);

                if ( !isset($query) ) {
                    continue;
                }

                $column = $this->columnMap[$parms] ?? $parms;

                foreach( $operators as $operator ) {
                    if ( isset( $query[$operator] ) ) {
                        $eloQuery[] = [ $column, $this->operatorMap[$operator], $query[$operator] ];
                    }
                }
            }

            return $eloQuery;   
        }
    }