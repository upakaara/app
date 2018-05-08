<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{
    use SoftDeletes;

    protected $table = 'jobs';

    protected $fillable = [
      'title', 'description', 'summary', 'status',
    ];

    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo('User');
    }
}
