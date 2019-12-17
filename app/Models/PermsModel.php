<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PermsModel extends Model
{
    //
    //主键
    protected $primaryKey = 'per_id';
    //表名
    protected $table = 'perms';
    //任何东西都可添加
    protected $guarded = [];
    //是否开启自动时间戳
    public $timestamps = false;
    
    
}