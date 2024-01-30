<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Attendance extends Model
{
    /**
     * The table associated with model
     * @var string
     */
    protected $table = 'attendance';

    protected $fillable = [
		'id',
		'user_id',
        'attendance_day_id',
        'is_present',
        'attendence',
		'created_at',
		'updated_at'
	];
    
    public function userType(){
        return $this->belongsTo('App\Models\UserTypes', 'user_type_id', 'id');
    }

    public function Profile(){
        return $this->hasOne('App\Models\Profile', 'user_id', 'id');
    }

    public function Experince(){
        return $this->hasMany('App\Models\Experince', 'user_id', 'id');
    }

    
    
}
