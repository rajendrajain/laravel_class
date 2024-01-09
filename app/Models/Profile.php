<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Profile extends Model
{
    /**
     * The table associated with model
     * @var string
     */
    protected $table = 'profiles';

    protected $fillable = [
		'id',
        'user_id',
        'pic',
        'salary_fees',
        'address',
        'zip',
        'gender',
        'dob',
        'marital_status',
        'joining_date',
        'blood_group',
        'phone',
        'dom',
        'main_course',
        'sub_course',
        'designation',
        'sub_designation',
        'city',
        'created_at',
        'updated_at',
	];
    
    public function Users(){
        return $this->belongsTo('App\Models\Users', 'user_id', 'id');
    }

    
}
