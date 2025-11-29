<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function dispaly_all()
    {
        return self::all();
    }

    public function displayById ($studnt_id)
    {
        return self::where ('id', $student_id)->first();
    }

}