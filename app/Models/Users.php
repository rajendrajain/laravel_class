<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Users extends Model
{
    /**
     * The table associated with model
     * @var string
     */
    protected $table = 'users';

    protected $fillable = [
		'id',
		'firstname',
		'lastname',
        'email',
        'password',
        'is_active',
        'is_deleted',
        'user_type_id',
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
