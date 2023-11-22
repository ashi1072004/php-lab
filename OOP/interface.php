<?php
// A class can inherit from one class only. Howeer, it can implement multiple interfaces.
// class implementing an interface is a concrete class
// interface enables multiple inheritances, it has no properties, its methods are public

interface Logger
{
    function log($message);
}

class FileLogger implements Logger
{
    private $handle;

    private $logFile;

    public function __construct($filename, $mode = 'a')
    {
        $this->logFile = $filename;
        // open log file for append
        $this->handle = fopen($filename, $mode)
            or die('Could not open the log file');
    }

    public function log($message)
    {
        $message = date('F j, Y, g:i a') . ': ' . $message . "\n";
        fwrite($this->handle, $message);
    }

    // public function read()
    // {
    //     return fread(fopen($this->$logFile, 'r'), filesize($this->logFile));
    // }

    public function __destruct()
    {
        if ($this->handle) {
            fclose($this->handle);
        }
    }
}

class DatabaseLogger implements Logger
{
    public function log($message)
    {
        echo sprintf("Log %s to the database\n", $message);
        // %s = "message" here
    }
}

$logger = new FileLogger('./text.txt', 'w');
$logger->log('PHP interface is awesome...');
// $logger->read();

$loggers = [
    new FileLogger('./log.txt'),
    new DatabaseLogger()
];

foreach ($loggers as $logger) {
    $logger->log('Log message');
}
