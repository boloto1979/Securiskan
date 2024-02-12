<?php

namespace App\Services;

class ClamAVScanner
{
    public function scan($filePath)
    {
        $output = null;
        $returnVar = null;
        exec("clamscan " . escapeshellarg($filePath), $output, $returnVar);

        if ($returnVar === 0) {
            return ['infected' => false];
        } elseif ($returnVar === 1) {
            return ['infected' => true, 'details' => $output];
        } else {
            return ['error' => "ClamAV scan failed"];
        }
    }
}
