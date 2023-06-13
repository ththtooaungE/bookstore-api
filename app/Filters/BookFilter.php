<?php

namespace App\Filters;

class BookFilter
{

    protected $safeParams = [
        'title' => ['eq'],
        'condition' => ['eq'],
        'stock' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'price' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'author' => ['eq'],
        'language' => ['eq'],
        'page' => ['eq', 'gt', 'gte', 'lt', 'lte']
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
    // protected $columnMap = [
    //     'numberOfPages' => 'number_of_pages'
    // ];

    public function transform($request)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operators) {

            $query = $request->query($param);
            if (!isset($query)) continue;

            $column = $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {

                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}
