<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Socket\Raw\Factory as SocketFactory;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        try {
            if (!$request->hasFile('file')) {
                return response()->json([
                    'success' => false,
                    'message' => 'No files were sent.',
                ], 400);
            }

            $file = $request->file('file');
            $result = $this->checkFileWithClamAV($file);

            $safetyMessage = $result['is_safe'] ? 'The file is safe.' : 'The file may be dangerous.';

            return response()->json([
                'success' => true,
                'message' => 'Analysis completed. ' . $safetyMessage,
                'data' => $result
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the file.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function checkFileWithClamAV($file)
    {
        // Replace 'tcp://clamav-server:3310' with your ClamAV server address
        $socketFactory = new SocketFactory();
        $socket = $socketFactory->createClient('tcp://clamav-server:3310');
        $socket->write("zINSTREAM\0");

        $fileResource = fopen($file->getRealPath(), 'rb');

        $chunkSize = 1024;

        while (!feof($fileResource)) {
            $chunk = fread($fileResource, $chunkSize);
            $socket->write(pack('N', strlen($chunk)) . $chunk);
        }
        fclose($fileResource);
        $socket->write(pack('N', 0));
        $result = $socket->read(4096);

        $socket->close();

        if (strpos($result, 'OK') !== false) {
            return ['is_safe' => true, 'scan_details' => 'No threat found.'];
        } else {
            return ['is_safe' => false, 'scan_details' => 'Threats detected. ' . $result];
        }
    }
}
