<?php

namespace App\Http\Controllers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function backup_view(){
        $listFileBackUp = glob(storage_path('app\Laravel\*'));
        $arr_listFile = [];
       foreach($listFileBackUp as $filename){
        //Simply print them out onto the screen.
            array_push($arr_listFile, substr( $filename, 51 , 80));
        }
    //   dd($arr_listFile);
        return view('backup.backup',['listfileBackUp'=>$arr_listFile,'list_path'=>$listFileBackUp]);
    }
    public function backup_file(Schedule $schedule,$filename){

        // $schedule->command('backup:run');
        // $schedule->exec('php artisan backup:run');
        $filename = glob(storage_path('app\Laravel\*'));

        return Storage::download(storage_path('app\Laravel').$filename);
    }
}
