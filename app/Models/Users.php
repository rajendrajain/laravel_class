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
    
    public function group(){
        return $this->belongsTo('App\Models\Groups', 'group_id', 'id');
    }

    
}
