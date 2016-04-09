<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
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

        $zipFileName = 'files.zip';

        if ($zip->open($path . '/' . $zipFileName, ZipArchive::CREATE) === true) {
            // Copy all the files from the folder and place them in the archive.
            foreach (glob($path . '/*') as $fileName) {
                $file = basename($fileName);
                $zip->addFile($fileName, $file);
            }
            $zip->close();

            $pathZip = $path . '/' . $zipFileName;

            session()->flash('link', $pathZip);

            return redirect()->to('/');
        }

    }

    public function mail(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'userMessage'=>$request->message,
        ];

        Mail::send('contact',$data, function ($m) {
            $m->from('info@minutas.co', 'Minutas.co');

            $m->to('luismec90@gmail.com', 'Luis M')->subject('minutas.co contacto');
        });

        session()->flash('emailSent', 'true');

        return redirect()->to('/');
    }
}
