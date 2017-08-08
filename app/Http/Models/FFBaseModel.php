<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class FFBaseModel extends Model
{
    use SoftDeletes;

    public $incrementing = false;


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $model->{$model->getKeyName()} = (string)$model->generateNewId();
        });
    }

    /**
     *
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function generateNewId()
    {
        if (isset($this->attributes['id'])) {
            return $this->attributes['id'];
        }

        return Uuid::uuid4();

    }
    /**
     * [getTableName description]
     * @return $table name
     */
    public function getTableName()
    {
        $tableName = substr($this->table,3, -1);
        return $tableName;
    }


}
