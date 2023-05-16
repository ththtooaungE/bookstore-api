<?php

namespace App\Filters;

class BookFilter
{

    protected $safeParams = [
        'title' => ['eq'],
        'type' => ['eq'],
        'condition' => ['eq'],
        'stock' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'price' => ['eq'],
        'author' => ['eq'],
        'language' => ['eq'],
        'numberOfPages' => ['eq', 'gt', 'gte', 'lt', 'lte']
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '>=',
        'gt' => '>',
        'gte' => '>=',
    ];
    protected $columnMap = [
        'numberOfPages' => 'number_of_pages'
    ];

    public function transform($request)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operators) {

            $query = $request->query($param);
            if (!isset($query)) continue;

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if(isset($query[$operator])) {
                    if($operator == 'eq' && $param == 'title') {
                        // 'eq' into 'like'
                        $eloQuery[] = [$column, 'like', '%'.$query[$operator].'%'];
                    } else {
                        $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];

                    }
                }
            }
        }
        return $eloQuery;

    }
}
