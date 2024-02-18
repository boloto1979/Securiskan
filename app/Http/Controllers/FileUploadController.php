<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\VirusTotalService;

class FileUploadController extends Controller
{
    protected $virusTotalService;

    public function __construct(VirusTotalService $virusTotalService)
    {
        $this->virusTotalService = $virusTotalService;
    }

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
            $filePath = $file->getRealPath();
            $result = $this->virusTotalService->scanFile($filePath);

            $isSafe = $this->interpretVirusTotalResponse($result);

            $safetyMessage = $isSafe ? 'The file is safe.' : 'The file may be dangerous.';

            return response()->json([
                'success' => true,
                'message' => 'Complete analysis. ' . $safetyMessage,
                'data' => $result
            ]);
        } catch (\Exception $e) {
            Log::error("Error processing the file: " . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the file.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function interpretVirusTotalResponse($response)
    {
        if (isset($response['data']) && $response['data']['attributes']['last_analysis_stats']['malicious'] > 0) {
            return false;
        }
        return true;
    }
}
