<?php

namespace Mmarigny\NameGenerator;

class Generator
{
    protected $dir = __DIR__ . '/names';

    protected $countryCodes = [];

    protected $data = [];

    protected function readFile($filename)
    {
        $file = $this->dir . '/' . $filename;

        if (false == file_exists($file))
            throw new \Exception('Unfound file : ' . $file);

        return explode("\n", file_get_contents($file));
    }


    public function loadCountryCode($countryCode)
    {
        if (false == isset($this->data[$countryCode]))
            $this->data[$countryCode] = [];

        if (empty($this->data[$countryCode])) {
            $this->data[$countryCode]['lastname'] = $this->readFile($countryCode . '/' . 'lastname.txt');
            $this->data[$countryCode]['female'] = $this->readFile($countryCode . '/' . 'female.txt');
            $this->data[$countryCode]['male'] = $this->readFile($countryCode . '/' . 'male.txt');
        }

        return $this;
    }


    public function load()
    {
        if (empty($this->countryCodes)) {
            $this->countryCodes = array_values(array_diff(scandir($this->dir), array('..', '.')));

            if (empty($this->countryCodes))
                throw new \Exception("No any name directory found");
        }

        foreach ($this->countryCodes as $cc) {
            $this->loadCountryCode($cc);
        }

        return $this;
    }


    public function getName($countryCode = "", $gender = '')
    {
        if (false == empty($countryCode))    // get a name for a given cc
        {
            if (empty($this->data[$countryCode]))
                $this->loadCountryCode($countryCode);
        } else                                // get a name in all loaded cc
        {
            if (empty($this->data))
                $this->load();

            $rand = rand(0, count($this->countryCodes) - 1);

            $countryCode = $this->countryCodes[$rand];
        }

        if ('female' != $gender && 'male' != $gender) {
            $gender = rand(0, 1) ? 'female' : 'male';
        }

        $ok = count($this->data[$countryCode][$gender]);

        $lastname = $this->data[$countryCode]['lastname'][rand(0, count($this->data[$countryCode]['lastname']) - 1)];
        $firstname = $this->data[$countryCode][$gender][rand(0,
            count($this->data[$countryCode][$gender]) - 1)];

        return [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'gender' => $gender,
            'country' => $countryCode,
        ];
    }

    public function setDir($dir)
    {
        $this->dir = $dir;

        return $this;
    }

}