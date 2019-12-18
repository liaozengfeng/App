<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttrvalModel extends Model
{
    //
    //主键
    protected $primaryKey = 'attr_val_id';
    //表名
    protected $table = 'attr_val';
    //任何东西都可添加
    protected $guarded = [];
    //是否开启自动时间戳
    public $timestamps = false;
    
}
