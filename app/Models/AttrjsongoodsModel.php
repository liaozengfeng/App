<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttrjsongoodsModel extends Model
{
    //
    //主键
    public $incrementing = false;
    //表名
    protected $table = 'attr_joIn_goods';
    //任何东西都可添加
    protected $guarded = [];
    //是否开启自动时间戳
    public $timestamps = false;
    
}
