<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "img_upload";
    protected $fillable = ['url_foto'];
}
