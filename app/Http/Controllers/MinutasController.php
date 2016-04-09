<?php namespace App\Http\Controllers;

use App\Group;
use App\Participant;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;
use App;
use Mail;
use File;
use ZipArchive;

class MinutasController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function generate(Request $request)
    {
        $data = Excel::load($request->file('excel'), function ($reader) {
            $reader->toArray();
        })->get();

        $i = 1;

        $path = "minutas_tmp/tmp_" . time();
        mkdir($path);

        foreach ($data as $row) {
            $template = $request->file('word');
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template);
            foreach ($row as $k => $v) {
                $templateProcessor->setValue($k, $v);
            }
            $templateProcessor->saveAs("$path/file_$i.docx");

            $i++;
        }

        $zip = new ZipArchive;

        $zipFileName='files.zip';

        if ( $zip->open( $path . '/' . $zipFileName, ZipArchive::CREATE ) === true ) {
            // Copy all the files from the folder and place them in the archive.
            foreach (glob($path . '/*') as $fileName) {
                $file = basename($fileName);
                $zip->addFile($fileName, $file);
            }

            $zip->close();

            $pathZip = $path . '/files.zip';

            session()->flash('link',$path . '/' . $zipFileName);

            return redirect()->back();
        }

    }

}
