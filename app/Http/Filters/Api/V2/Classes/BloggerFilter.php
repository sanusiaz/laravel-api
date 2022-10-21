<?php

    namespace App\Http\Filters\Api\V2\Classes;
    use Illuminate\Http\Request;

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