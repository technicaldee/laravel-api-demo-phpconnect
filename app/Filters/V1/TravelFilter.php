<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class TravelFilter extends ApiFilter
{
    protected $safeParms = [
        'title' => ['eq'],
        'description' => ['eq'],
        'image' => ['eq'],
    ];

    protected $columnMap = [
        'travelDate' => 'travel_date'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
}
