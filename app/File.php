<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "img_upload";
    protected $fillable = ['url_foto', 'user_id'];

    // un fichero solo puede ser subido por un único usuario
    public function user() {
        return $this->belongsTo('App/User');

    }
}
