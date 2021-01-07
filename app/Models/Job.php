<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Job extends Model
{
    use HasFactory;

    public $table = 'jobs';

    public $timestamps = false;

    protected $dates = [
        'created_at'
    ];

    protected $fillable = [
        'job_title',
        'company',
        'location',
        'salary',
        'summary',
        'post_date',
        'link',
        'full_text',
        'new',
        'twitter',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function jobPostedJobs()
    {
        return $this->hasMany(PostedJob::class, 'job_id', 'id');
    }
}
