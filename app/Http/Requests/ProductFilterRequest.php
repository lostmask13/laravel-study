<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class ProductFilterRequest
{
    private $builder;
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function apply($builder) {
        $this->builder = $builder;
        foreach ($this->request->query() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

}
