<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'roll',
        'name',
        'batch_id'
    ];
    public $timestamps = true;

    public function batch(){
        return $this->belongsTo('App\Batch','batch_id');
    }
    public static function studcount($batch_id){
        $batchCount = Student::where('batch_id', $batch_id)->count();
        return $batchCount;
    }
    public function issuestud(){
        return $this->hasMany('App\Issuestud');
    }
}
