<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Stem\LinguaStemRu;

class Product extends Model
{

    protected $fillable = [
        'brand_id',
        'name',
        'slug',
        'content',
        'image',
        'price',
        'new',
        'hit',
        'sale',
    ];


    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function baskets()
    {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }


    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \App\Http\Requests\ProductFilterRequest $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterProducts($builder, $filters)
    {
        return $filters->apply($builder);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        $search = trim($search);
        if (empty($search)) {
            return $query->whereNull('id');
        }
        $temp = explode(' ', $search);
        $words = [];
        $stemmer = new LinguaStemRu();

        foreach ($temp as $item) {
            if (iconv_strlen($item) > 3) {
                $words[] = $stemmer->stem_word($item);
            } else {
                $words[] = $item;
            }
        }
        $relevance = "IF (`products`.`name` LIKE '%" . $words[0] . "%', 2, 0)";
        $relevance .= " + IF (`products`.`content` LIKE '%" . $words[0] . "%', 1, 0)";
        $relevance .= " + IF (`brands`.`name` LIKE '%" . $words[0] . "%', 2, 0)";
        for ($i = 1; $i < count($words); $i++) {
            $relevance .= " + IF (`products`.`name` LIKE '%" . $words[$i] . "%', 2, 0)";
            $relevance .= " + IF (`products`.`content` LIKE '%" . $words[$i] . "%', 1, 0)";
            $relevance .= " + IF (`brands`.`name` LIKE '%" . $words[$i] . "%', 2, 0)";
        }

        $query->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select('products.*', DB::raw($relevance . ' as relevance'))
            ->where('products.name', 'like', '%' . $words[0] . '%')
            ->orWhere('products.content', 'like', '%' . $words[0] . '%')
            ->orWhere('brands.name', 'like', '%' . $words[0] . '%');
        for ($i = 1; $i < count($words); $i++) {
            $query = $query->orWhere('products.name', 'like', '%' . $words[$i] . '%');
            $query = $query->orWhere('products.content', 'like', '%' . $words[$i] . '%');
            $query = $query->orWhere('brands.name', 'like', '%' . $words[$i] . '%');
        }
        $query->orderBy('relevance', 'desc');
        return $query;
    }
}
