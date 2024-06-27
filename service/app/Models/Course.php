<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "courses";
    protected $primaryKey = "course_id";

    protected $fillable = [
        'course_name',
        'course_description',
        'course_price',
        'status_id',
        'user_id'
    ];

    public function statuses(): BelongsTo {
        return $this->belongsTo(Status::class, "status_id", "course_id");
    }

    public function sections(): BelongsToMany {
        return $this->hasMany(Section::class, "section_id", "course_id");
    }

}
