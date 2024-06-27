<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "courses";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'course_name',
        'course_description',
        'course_price',
        'status_id',
    ];

    public function statuse(): BelongsTo {
        return $this->belongsTo(Status::class, "status_id", "id");
    }

    public function sections(): HasMany {
        return $this->hasMany(Section::class, "course_id", "id");
    }

}
