<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\GildedRose;

class GlidedRoseTest extends TestCase
{
    public function testQualityCanNotBeZeroOrNegative():void
    {
        $item=GildedRose::of('normal', 0,5);
        $item->tick();

        $this->assertEquals($item->quality,0);
        
    }

    public function testUpdatesCorrectlyBeforeTheSellDateArrives():void
    {
        $item = GildedRose::of('normal', 10, 5);
        $item->tick();

        $this->assertEquals($item->quality,9);
        $this->assertEquals($item->sellIn,4);
        
    }

    public function testUpdatesCorrectlyAndDoNotPassTheQualityAndSellInDate(): void
    {
        $item = GildedRose::of('normal', 10, 5);
        $item->tick();

        $this->assertNotEquals($item->quality,8);
        $this->assertNotEquals($item->sellIn,3);
    }




}