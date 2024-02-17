<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'file' => 'required|file|clamav',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validação do arquivo falhou.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $file = $request->file('file');
            $result = $this->checkFileWithApi($file);

            $safetyMessage = $result['is_safe'] ? 'O arquivo é seguro.' : 'O arquivo pode ser perigoso.';

            return response()->json([
                'success' => true,
                'message' => 'Análise concluída. ' . $safetyMessage,
                'data' => $result
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro durante a análise do arquivo.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    private function checkFileWithApi($file)
    {

        return [
            'is_safe' => true,
            'scan_details' => 'Detalhes fictícios da verificação'
        ];
    }
}
