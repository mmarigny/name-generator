<?php

namespace Mmarigny\NameGenerator;

use PHPUnit_Framework_TestCase;

class GeneratorTest extends PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $generator = new Generator();
        $name = $generator->generate();
        
        $this->assertInternalType('array', $name);
        $this->assertNotEmpty($name['firstname']);
        $this->assertNotEmpty($name['lastname']);
        $this->assertEquals(['female', 'male'], $name['gender']);
        $this->assertNotEmpty($name['country']);
    }

    public function testGenerateCountryCode()
    {
        $generator = new Generator();
        $name = $generator->generate('FR');
        
        $this->assertInternalType('array', $name);
        $this->assertNotEmpty($name['firstname']);
        $this->assertNotEmpty($name['lastname']);
        $this->assertEquals(['female', 'male'], $name['gender']);
        $this->assertNotEmpty($name['country']);
    }
}
