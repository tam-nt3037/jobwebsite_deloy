<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post_News extends Model
{

    // Table Name
    protected $table = 'post_news';
    // Primary Key
    public $primaryKey = 'id_posts';
    // Timestamps
    public $timestamps = true;

}
