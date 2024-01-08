<?php

namespace App\Traits;

trait Loggable {
    public function logError(string $message) {
        $this->writeLog("ERROR", $message);
    }
    public function logWarning(string $message) {
        $this->writeLog("WARNING", $message);
    }
    public function logInfo(string $message) {
        $this->writeLog("INFO", $message);
    }

    private function writeLog(string $level, string $message) {
        $logEntry = "[$level] " . date('Y-m-d H:i:s') . " - $message\n";
        file_put_contents('app.log', $logEntry, FILE_APPEND);
    }
}
