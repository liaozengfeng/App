<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BrandModel extends Model
{
    //
    //����
    protected $primaryKey = 'brand_id';
    //����
    protected $table = 'brands';
    //�κζ����������
    protected $guarded = [];
    //�Ƿ����Զ�ʱ���
    public $timestamps = false;
    
}