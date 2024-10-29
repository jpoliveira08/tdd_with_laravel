<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function the_bike_moves()
    {
        $bike = new Bike();

        $this->assertFalse($bike->moving);
        $this->assertEquals(0, $bike->speed);

        $bike->ride(20);

        $this->assertTrue($bike->moving);
        $this->assertEquals(20, $bike->speed);
    }

    public function the_bike_stops()
    {
        $bike = new Bike();
        $bike->ride(20);

        $this->assertTrue($bike->moving);
        $this->assertEquals(20, $bike->speed);

        $bike->stop();

        $this->assertFalse($bike->moving);
        $this->assertEquals(0, $bike->speed);
    }
}

class Bike
{
    public $moving = false;

    public $speed = 0;

    public function ride($speed = 5)
    {
        $this->moving = true;
        $this->speed = $speed;
    }

    public function stop()
    {
        $this->moving = false;
        $this->speed = 0;
    }
}
