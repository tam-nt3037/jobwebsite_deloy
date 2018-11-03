<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    // Table Name
    protected $table = 'recruiter';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function post_news()
    {
        return $this->hasMany('App\Model\Post_News');
    }
}
