<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	use HasFactory;

	protected $table = 'todo';

	protected $fillable = [
		'user_id',
		'todo',
		'priority',
		'deadline_date',
		'status',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
