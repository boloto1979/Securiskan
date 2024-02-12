<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClamAVScanner;
use Illuminate\Support\Facades\Log;


class FileUploadController extends Controller
{
    protected $clamAVScanner;

    public function __construct(ClamAVScanner $clamAVScanner)
    {
        $this->clamAVScanner = $clamAVScanner;
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $filePath = $file->getPathname();

        $scanResult = $this->clamAVScanner->scan($filePath);

        if (isset($scanResult['infected']) && $scanResult['infected']) {
            return response()->json(['message' => 'File is infected.', 'details' => $scanResult['details']], 422);
        } elseif (isset($scanResult['error'])) {
            return response()->json(['message' => $scanResult['error']], 500);
        }

        return response()->json(['message' => 'Your file is safe.']);

        Log::info('File upload request received');
        Log::info('File path: ' . $filePath);

    }

}
