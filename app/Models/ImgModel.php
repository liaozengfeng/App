<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ImgModel extends Model
{
    //
    //主键
    protected $primaryKey = 'img_id';
    //表名
    protected $table = 'img';
    //任何东西都可添加
    protected $guarded = [];
    //是否开启自动时间戳
    public $timestamps = false;
    
    
}