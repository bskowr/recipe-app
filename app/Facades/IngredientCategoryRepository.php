<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class IngredientCategoryRepository extends Facade
{
    protected static function getFacadeAccessor(){
        return 'IngredientCategoryRepository';
    }
}
