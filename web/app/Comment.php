<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comments';

  protected $fillable = [
    'comment', 'job_id', 'author',
  ];
  
  public function user() {
      return $this->belongsTo('App\User', 'author');
  }
}
