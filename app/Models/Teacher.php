<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'teacher';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'contact_no',
        'password',
        'subject',
        'hire_date',
    ];

    /**
     * Return all teachers.
     */
    public static function displayAll()
    {
        return self::all();
    }

    /**
     * Return teacher by id.
     */
    public static function displayById($id)
    {
        return self::find($id);
    }
}
