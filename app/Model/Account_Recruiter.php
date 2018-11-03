<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account_Recruiter extends Model
{
    // Table Name
    protected $table = 'account_recruiter';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function post_news()
    {
        return $this->hasMany(Post_News::class);
    }
}
