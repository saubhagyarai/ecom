<?php

namespace app\Http\Helpers\General;

use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection as IlluminateCollection;

class CollectionHelper
{

    /***
     * This function is to paginate the collection 
     */
    public static function paginate(IlluminateCollection $collection, $pageSize)
    {
        $page = Paginator::resolveCurrentPage('page');
        $total = $collection->count();

        return self::paginator($collection->forPage($page, $pageSize), $total, $pageSize, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
    }

    /**
     * Create a new length-aware paginator instance.
     *
     * @param  \Illuminate\Support\Collection  $items
     * @param  int  $total
     * @param  int  $perPage
     * @param  int  $currentPage
     * @param  array  $options
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    protected static function paginator($items, $total, $perPage, $currentPage, $options)
    {
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items', 'total', 'perPage', 'currentPage', 'options'
        ));
    }

}