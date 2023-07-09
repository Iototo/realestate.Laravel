<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'realestates'; // テーブル名を指定
    protected $primaryKey = 'id'; // 主キーを指定

    // 代入を許可するカラムを指定
    protected $fillable = [
        'name',
        'address',
        'breadth',
        'floor_plan',
        'tenancy_status',
        'account_id',
    ];

    // 日付を変形する属性
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // アカウントとのリレーション定義
    public function account()
    {
        return $this->belongsTo('App\Models\User', 'account_id');
    }

}