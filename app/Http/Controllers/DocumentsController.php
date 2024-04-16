<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentUploadRequest;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    /**
     * Store a newly created document in storage.
     *
     * @param  \App\Http\Requests\DocumentUploadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentUploadRequest $request)
    {
        // Handle the document upload logic and store the document in the storage directory

        $filename = $request->filename;
        $file = $request->file('file');
        
        // Store the file in the 'documents' directory
        $path = $file->store('documents');

        // Create a new document record in the database
        $document = new Document();
        $document->filename = $filename;
        $document->file = $path;
        $document->user_id = Auth::id(); 
        $document->save();

        // Return a response, redirect, or whatever is appropriate
        // return response()->json(['message' => 'Document uploaded successfully'], 201);
        return redirect()->route('profile.edit')->with('success', 'Document uploaded successfully.');
        
    }
}
