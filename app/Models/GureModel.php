<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GureModel extends Model
{
    //
    //����
    protected $primaryKey = 'gure_id';
    //����
    protected $table = 'gures';
    //�κζ����������
    protected $guarded = [];
    //�Ƿ����Զ�ʱ���
    public $timestamps = false;
    
}