<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\MalwareAnalysisService;
use Exception;

class FileUploadController extends Controller
{
    protected $malwareAnalysisService;

    public function __construct(MalwareAnalysisService $malwareAnalysisService)
    {
        $this->malwareAnalysisService = $malwareAnalysisService;
    }

    public function store(Request $request)
    {
        try {
            if (!$request->hasFile('file')) {
                return response()->json([
                    'success' => false,
                    'message' => 'No file was sent.',
                ], 400);
            }

            $file = $request->file('file');
            $filePath = $file->getRealPath();
            $result = $this->malwareAnalysisService->scanFile($filePath);

            $isSafe = $result['isSafe'];
            $safetyMessage = $isSafe ? 'The file is safe.' : 'The file may be dangerous.';

            return response()->json([
                'success' => true,
                'message' => 'Complete analysis. ' . $safetyMessage,
                'data' => $result['details'],
            ]);
        } catch (Exception $e) {
            Log::error("Error processing the file: " . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the file.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
