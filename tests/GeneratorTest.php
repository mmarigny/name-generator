<?php

class GeneratorTest extends PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $generator = new Mmarigny\NameGenerator\Generator();
        $name = $generator->getName();
        
        $this->assertInternalType('array', $name);
        $this->assertNotEmpty($name['firstname']);
        $this->assertNotEmpty($name['lastname']);
        $this->assertContains($name['gender'], ['female', 'male']);
        $this->assertNotEmpty($name['country']);
    }

    public function testGenerateCountryCode()
    {
        $generator = new Mmarigny\NameGenerator\Generator();
        $name = $generator->getName('FR');
        
        $this->assertInternalType('array', $name);
        $this->assertNotEmpty($name['firstname']);
        $this->assertNotEmpty($name['lastname']);
        $this->assertContains($name['gender'], ['female', 'male']);
        $this->assertNotEmpty($name['country']);
    }
}
