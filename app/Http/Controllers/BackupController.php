<?php

namespace App\Http\Controllers;

use App\Backup;
use App\AutoBackup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackupController extends Controller
{
  //
  public function saveBackup(Request $request)
  {
    $item = new Backup;
    $item->user_id = Auth::user()->id;
    $item->data = $request->getContent();
    $item->save();
    return response([
        'status' => 'success',
    ], 200);
  }

  public function autoSaveBackup(Request $request)
  {
    AutoBackup::updateOrCreate(
        ['user_id' => Auth::user()->id],
        ['data' => $request->getContent()]
    );
    return response([
        'status' => 'success',
    ], 200);
  }

  public function getAutoBackup()
  {
    $backup = AutoBackup::where('user_id', Auth::user()->id)->get();
    return response([
        'status' => 'success',
        'backup' => $backup,
    ]);
  }

  public function getBackups()
  {
    $backups = Backup::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
    return response([
        'status' => 'success',
        'backups' => $backups,
    ]);
  }

  public function getBackup(Request $request)
  {
    $backup = Backup::where('id', $request->id)->get();
    return response([
        'status' => 'success',
        'backup' => $backup,
    ]);
  }

  public function deleteBackup(Request $request)
  {
    $result = Backup::where('id', $request->id)->delete();
    return $result;
  }


}
