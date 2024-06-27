<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Status extends Model
{
    protected $table = "statuses";
    protected $primaryKey = "status_id";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status_name',
    ];

    public function course(): HasOne
    {
        return $this->hasOne(Course::class, "course_id", "status_id");
    }

}
