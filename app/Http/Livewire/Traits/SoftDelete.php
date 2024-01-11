<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Database\Eloquent\Model;

trait SoftDelete
{
    protected function softDeleteNotificationTitle(){
        return __('translation.messages.successes.soft_delete.title');
    }

    protected function softDeleteNotificationDescription(Model $model){
        if (isset($model->name)){
            $name = $model->name;
        } else if (isset($model->id)) {
            $name = $model->id;
        } else {
            $name = $model;
        }
        return __('translation.messages.successes.soft_delete.description', ['name' => $name]);
    }

    public function softDelete($id){
        $model = $this->model::find($id);
        $model->delete();
        $this->notification()->success(
            $title = $this->softDeleteNotificationTitle(),
            $description = $this->softDeleteNotificationDescription($model)
        );
    }
}
