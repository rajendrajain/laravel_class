<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserTypes extends Model
{
    /**
     * The table associated with model
     * @var string
     */
    protected $table = 'user_types';

    protected $fillable = [
		'id',
        'name',
		'created_at',
		'updated_at'
	];
    
    public function user(){
        return $this->hasMany('App\Models\Users', 'id', 'user_type_id');
    }

    
}
