<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class PostedJob extends Model
{
    use HasFactory;

    public $table = 'posted';

    public $timestamps = false;

    protected $dates = [
        'post_date'
    ];

    protected $fillable = [
        'job_id',
        'platform',
        'link'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
