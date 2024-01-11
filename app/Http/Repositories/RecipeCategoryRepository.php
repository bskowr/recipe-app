<?php

namespace App\Http\Repositories;
use App\Models\RecipeCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RecipeCategoryRepository
{
    public function select(string|null $search, array|null $selected): Collection{
        return RecipeCategory::query()
        ->select('id', 'name')
        ->orderBy('name')
        ->when(
            $search,
            fn (Builder $query) => $query->where(
                'name',
                'like',
                '%'.$search.'%'
            )
        )
        ->when(
            $selected,
            fn (Builder $query) => $query->whereIn('id', $selected),
            fn (Builder $query) => $query
        )
        ->get();
    }
}
