<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GoodsModel extends Model
{
    //
    //主键
    protected $primaryKey = 'goods_id';
    //表名
    protected $table = 'goods';
    //任何东西都可添加
    protected $guarded = [];
    //是否开启自动时间戳
    public $timestamps = false;
    
}