<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoBackup extends Model
{
  protected $table = 'auto_backups';

  protected $fillable = [
      'user_id',
      'data',
  ];
}
