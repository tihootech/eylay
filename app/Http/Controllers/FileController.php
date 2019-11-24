<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function index()
    {
        $files = File::latest()->get();
        return view('dashboard.file.index', compact('files'));
    }

    public function create()
    {
        $file = new File;
        return view('dashboard.file.form', compact('file'));
    }

    public function store(Request $request)
    {
        $data = self::validation(new File);
        File::create($data);
        return redirect()->route('file.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function edit(File $file)
    {
        return view('dashboard.file.form', compact('file'));
    }

    public function update(Request $request, File $file)
    {
        $data = self::validation($file);
        $file->update($data);
        return redirect()->route('file.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function destroy(File $file)
    {
        delete_file($file->path);
        $file->delete();
        return redirect()->route('file.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public static function validation($file)
    {
        $data = request()->validate([
            'title' => 'required',
            'path' => 'nullable',
            'link' => 'nullable',
            'access' => 'nullable',
            'info' => 'nullable',
            'upload_file' => 'nullable',
        ]);
        if ( isset($data['upload_file']) && $data['upload_file'] ) {
            $data['path'] = upload($data['upload_file'], $file->path);
        }
        unset($data['upload_file']);
        return $data;
    }
}
