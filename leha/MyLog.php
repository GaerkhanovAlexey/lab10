<?php namespace leha;

use core\LogAbstract;
use core\LogInterface;


Class MyLog extends LogAbstract implements LogInterface
{
    private $writeLogArray = array();

    public static function getWriteLogArray(){
    return self::Instance()->writeLogArray;
}

    public static function getLogArray(){
    return self::Instance()->log;
}

    public static function ClearLogArray()
{
    self::Instance()->log = array();
    self::Instance()->writeLogArray = array();
}

    public static function log(string $str): void
{
    self::Instance()->_log($str);
}

    public function _log($str)
{
    $this->log[] = $str;
}

    public static function write(): void
{
    self::Instance()->_write();
}

    public function _write()
{
    $date = date('d-m-Y\_H.i.s.u');
    foreach ($this->log as $value) {
        array_push($this->writeLogArray, $value);
        echo $value . "\r\n";
        if (!is_dir("log")) {
            mkdir("log", 0700);
        }
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . "log\\$date.log", trim($value . "\r\n") . PHP_EOL, FILE_APPEND);
    }
}
}

?>