<?php

use leha\MyLog;
use PHPUnit\Framework\TestCase;

class MyLogTest extends TestCase
{
    public function testWrite()
    {
        MyLog::ClearLogArray();
        MyLog::log('T');
        MyLog::log('A');
        MyLog::write();
        $this->assertEquals(['T','A'] ,MyLog::getWriteLogArray());
        MyLog::ClearLogArray();
        MyLog::log('DO');
        MyLog::write();
        $this->assertEquals(['DO'], MyLog::getWriteLogArray());
        MyLog::ClearLogArray();
        MyLog::write();
        $this->assertEquals([], MyLog::getWriteLogArray());
    }
}
