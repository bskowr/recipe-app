<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class IngredientRepository extends Facade
{
    protected static function getFacadeAccessor(){
        return 'IngredientRepository';
    }
}
