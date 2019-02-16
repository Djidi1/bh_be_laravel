<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
  protected $table = 'backups';

  protected $fillable = [
      'user_id',
      'data',
  ];
}
