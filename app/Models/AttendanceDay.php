<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AttendanceDay extends Model
{
    /**
     * The table associated with model
     * @var string
     */
    protected $table = 'attendance_days';

    protected $fillable = [
		'id',
		'attendance_date',
        'attendance_taken_by_id',
        'total_present',
        'total_absent',
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

    public function attendaceTakenBy(){
        return $this->belongsTo('App\Models\Users', 'attendance_taken_by_id', 'id');
    }
}
