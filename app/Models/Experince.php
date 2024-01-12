<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Experince extends Model
{
    /**
     * The table associated with model
     * @var string
     */
    protected $table = 'experince';

    protected $fillable = [
		'id',
		'user_id',
        'company',
        'profile',
        'start_date',
        'end_date',
        'comment',
		'created_at',
		'updated_at'
	];
    

    
}
