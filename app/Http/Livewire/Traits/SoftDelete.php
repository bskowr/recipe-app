<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Database\Eloquent\Model;

trait SoftDelete
{
    protected function softDeleteNotificationTitle(){
        return __('translation.messages.success.soft_delete.title');
    }

    protected function softDeleteNotificationDescription(Model $model){
        return __('translation.messages.success.soft_delete.description', ['model' => $model]);
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
