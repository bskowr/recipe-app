<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\Users\Filters\EmailVerifiedFilter;
use App\Http\Livewire\Users\Filters\RoleFilter;
use App\Models\User;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;

class UsersTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;
    
    public $searchBy = [
        'name',
        'email',
        'email_verified_at',
        'roles.name'
    ];
    protected $paginate = 5;

    public function repository(): Builder
    {
       return User::query()->with('roles');
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('users.attributes.name'))->sortBy('name'),
            Header::title(__('users.attributes.email'))->sortBy('email'),
            Header::title(__('users.attributes.email'))->sortBy('email_verified_at'),
            __('users.attributes.roles'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            $model->email,
            $model->email_verified_at,
            $model->roles->implode('name', ', '),
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function filters()
    {
        return [
            new EmailVerifiedFilter,
            new RoleFilter
        ];
    }
}
