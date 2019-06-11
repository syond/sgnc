<?php
namespace App;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Model
 * @package App
 */
class ModelTest extends Eloquent
{
    use SoftDeletes;
    /**
     * Enable Table Timestamps
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * Execute Actions On Boot
     *
     * @return void
     */
    public static function boot()
    {
      parent::boot();
      static::deleting(function($model) {
            // CASCADE SOFT DELETE
            if (isset($model->cascadeDelete)) {
                collect($model->cascadeDelete)->each(function ($class, $method) use ($model) {
                    if (method_exists($model, $method)) {
                        collect($model->$method($class)->get())->each(function ($model) {
                            $model->delete();
                        });
                        $model->$method($class)->delete();
                    }
                });
            }
            // CASCADE PERMANENTLY DELETE
            if (isset($model->cascadeForceDelete)) {
                collect($model->cascadeForceDelete)->each(function ($class, $method) use ($model) {
                    if (method_exists($model, $method)) {
                        collect($model->$method($class)->get())->each(function ($model) {
                            $model->forceDelete();
                        });
                        $model->$method($class)->forceDelete();
                    }
                });
            }
        });
    }
}
?>