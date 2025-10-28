<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Laravel assumes the table is 'jobs', but we are using 'job_listings'
    protected $table = 'job_listings';

    // Optional: if you want to keep a similar find behavior with automatic 404
    public static function findOrAbort($id)
    {
        $job = static::find($id); // Eloquent find
        if (!$job) {
            abort(404);
        }
        return $job;
    }
}
