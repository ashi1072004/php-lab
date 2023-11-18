<?php
class File
{
    private $filename; //default value of property = "null"
    private $handle;

    public function __construct($filename, $mode = 'r')
    {
        $this->filename = $filename;
        $this->handle = fopen($filename, $mode);
    }
    public function __destruct()
    {
        if ($this->handle) {
            fclose($this->handle);
        }
    }
    public function read()
    {
        return fread($this->handle, filesize($this->filename));
    }
}
$f = new File("./text.txt");
echo $f->read();
