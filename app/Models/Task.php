<?php

namespace App\Models;

use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = 'tasks';
    protected $fillable = ['title','description', 'deadline', 'status'];

    protected $casts = [
        'deadline' => 'date',
        'status' => TaskStatus::class,
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
