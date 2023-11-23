<?php
namespace App\Http\Livewire\Users\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use Illuminate\Support\Facades\Auth;

class RemoveEditorRoleAction extends Action
{
    public $title = '';
    public $icon = 'shield';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('users.actions.remove_editor_role');
    }

    public function handle($model, View $view)
    {
        $model->removeRole(config('auth.roles.editor'));
        $this->success(__('users.messages.successes.editor_role_removed'));
    }

    public function renderIf($model, View $view)
    {
        return Auth::user()->isEditor()
            && $model->hasRole(config('auth.roles.editor'));
    }
}