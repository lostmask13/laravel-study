<?php

namespace App\Http\Requests;

class BrandCatalogRequest extends CatalogRequest
{

    /**
     * @var array
     */
    protected $entity = [
        'name' => 'brand',
        'table' => 'brands'
    ];

    /**
     *
     * @return bool
     */
    public function authorize()
    {
        return parent::authorize();
    }

    public function rules()
    {
        return parent::rules();
    }

    /**
     */
    protected function createItem()
    {
        $rules = [];
        return array_merge(parent::createItem(), $rules);
    }

    /**
     */
    protected function updateItem()
    {
        $rules = [];
        return array_merge(parent::updateItem(), $rules);
    }
}
