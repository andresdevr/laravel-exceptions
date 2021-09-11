<?php

namespace Andresdevr\LaravelExceptions\Http\Controllers;

use Andresdevr\LaravelExceptions\Exceptions\FileWasNotFound;
use Illuminate\Support\Facades\File;

class AssetController extends Controller
{
    /**
     * Get the js file
     * 
     * @return \Illuminate\Http\Response
     */
    public function js()
    {
        return $this->getFile(__DIR__ . '/../../../public/js/exceptions.bundle.js', [
            'Content-Type' => 'application/javascript'
        ]);
    }

    /**
     * Get the css files
     * 
     * @return \Illuminate\Http\Response
     */
    public function css()
    {
        return $this->getFile(__DIR__ . '/../../../public/css/exceptions.bundle.css', [
            'Content-Type' => 'text/css; charset=utf-8'
        ]);
    }

    /**
     * Return the file 
     * 
     * @param string $filename
     * @return \Illuminate\Http\Response
     */
    private function getFile(string $filename, $headers = [])
    {
        if(File::exists($filename))
        {
            return response(File::get($filename), 200, $headers);
        }
        else
        {
            throw new FileWasNotFound("$filename was not found");
        }
    }
}
