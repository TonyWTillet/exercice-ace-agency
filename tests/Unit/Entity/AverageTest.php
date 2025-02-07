<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Average;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AverageTest extends KernelTestCase
{

    /**
     * Test id assign task
     *
     * @return void
     *
     */
    public function testId()
    {
        $average = new Average();
        $id = null;

        $this->assertEquals($id, $average->getId());
    }

    /**
     * Test field lastname
     *
     * @return void
     */
    public function testLastname(): void
    {
        $average = new Average();
        $value = 'Smith';

        $average->setLastname($value);
        $this->assertEquals($value, $average->getLastname());
    }

    /**
     * Test field firstname
     *
     * @return void
     */
    public function testFirstname(): void
    {
        $average = new Average();
        $value = 'John';

        $average->setFirstname($value);
        $this->assertEquals($value, $average->getFirstname());
    }

    /**
     * Test field details
     *
     * @return void
     */
    public function testDetails(): void
    {
        $average = new Average();
        $array = [10, 15, 20];

        $average->setDetails($array);
        $this->assertEquals($array, $average->getDetails());
    }

    /**
     * Test field average
     *
     * @return void
     */
    public function testAverage(): void
    {
        $average = new Average();
        $value = 15.5;

        $average->setAverage($value);
        $this->assertEquals($value, $average->getAverage());
    }


}