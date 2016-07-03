<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Document;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class DocumentsController extends Controller
{
    public function index()
    {
        $documents = Document::where('user_id', Auth::user()->id)->paginate(15);

        return view('user.documents', compact('documents'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'document' => 'required|file',
        ]);

        $category = Category::where('name', $request->get('category'))->first();
        if (!$category) {
            $category = new Category;
            $category->name = $request->get('category');
            $category->save();
        }

        $document = new Document;
        $document->title = $request->get('title');
        $document->user_id = Auth::user()->id;
        $document->category_id = $category->id;
        $document->save();

        $destinationPath = 'uploads'; // upload path
        $extension = Input::file('document')->getClientOriginalExtension(); // getting image extension
        $fileName = $document->id . '.' . $extension; // renameing image
        Input::file('document')->move($destinationPath, $fileName); // uploading file to given path
        $document->name = $fileName;
        $document->save();
        Flash::success('Documento subido exitosamente.');

        return redirect()->route('user.documents');
    }

    public function destroy(Request $request)
    {
        $documentId = $request->get('documentId');
        $document = Document::where('user_id', Auth::user()->id)->findOrFail($documentId);
        if($document){
            File::delete('uploads/'.$document->name);
            $document->delete();
            Flash::success('Documento eliminado exitosamente');
        }else{
            Flash::success('El documento no existe');

        }

        return redirect()->route('user.documents');
    }
}
