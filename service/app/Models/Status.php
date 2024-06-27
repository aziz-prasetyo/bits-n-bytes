<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "statuses";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;

    public function courses(): HasMany {
        return $this->hasMany(Course::class, "status_id", "id");
    }

}
