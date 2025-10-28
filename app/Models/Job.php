<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Laravel assumes the table is 'jobs', but we are using 'job_listings'
    protected $table = 'job_listings';

    // Allow mass assignment for these fields
    protected $fillable = ['title', 'salary', 'employer_id'];

    // Optional: if you want to keep a similar find behavior with automatic 404
    public static function findOrAbort($id)
    {
        $job = static::find($id); // Eloquent find
        if (!$job) {
            abort(404);
        }
        return $job;
    }

    // Step 1: Define belongsTo relationship to Employer
    public function employer()
    {
        return $this->belongsTo(\App\Models\Employer::class);
    }

    // Step 2: Define many-to-many relationship to Tags
    public function tags()
    {
        return $this->belongsToMany(
            \App\Models\Tag::class,   // Related model
            'job_listing_tag',        // Pivot table name
            'job_listing_id',         // Foreign key on pivot table for Job
            'tag_id'                  // Foreign key on pivot table for Tag
        );
    }
}
