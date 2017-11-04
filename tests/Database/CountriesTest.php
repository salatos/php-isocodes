<?php

namespace Sokil\IsoCodes\Databases;

use Sokil\IsoCodes\Database\Countries\Country;
use \Sokil\IsoCodes\IsoCodesFactory;

class CountriesTest extends \PHPUnit_Framework_TestCase
{
    public function testDbConsistency()
    {
        $isoCodes = new IsoCodesFactory();
        $countries = $isoCodes->getCountries();
        foreach ($countries as $country) {
            $this->assertInstanceOf(
                Country::class,
                $country
            );
        }
    }

    public function testEntryClass()
    {
        $isoCodes = new \Sokil\IsoCodes;
        $countries = $isoCodes->getCountries();
        
        $this->assertInstanceOf(
            Country::class,
            $countries->getByAlpha2('UA')
        );
    }
    
    public function testGetByAlpha2()
    {
        $isoCodes = new \Sokil\IsoCodes;
        $countries = $isoCodes->getCountries();
        
        $this->assertEquals(
            'Ukraine',
            $countries->getByAlpha2('UA')->getName()
        );
    }
    
    public function testGetLocalByAlpha2()
    {
        putenv('LANGUAGE=uk_UA.UTF-8');
        putenv('LC_ALL=uk_UA.UTF-8');
        setlocale(LC_ALL, 'uk_UA.UTF-8');
        
        $isoCodes = new \Sokil\IsoCodes;
        $countries = $isoCodes->getCountries();
        
        $this->assertEquals(
            'Україна',
            $countries->getByAlpha2('UA')->getLocalName()
        );
    }
        
    public function testGetByAlpha3()
    {
        $isoCodes = new \Sokil\IsoCodes;
        $countries = $isoCodes->getCountries();
        
        $this->assertEquals(
            'Ukraine',
            $countries->getByAlpha3('UKR')->getName()
        );
    }
    
    public function testGetLocalByAlpha3()
    {
        putenv('LANGUAGE=uk_UA.UTF-8');
        putenv('LC_ALL=uk_UA.UTF-8');
        setlocale(LC_ALL, 'uk_UA.UTF-8');
        
        $isoCodes = new \Sokil\IsoCodes;
        $countries = $isoCodes->getCountries();
        
        $this->assertEquals(
            'Україна',
            $countries->getByAlpha3('UKR')->getLocalName()
        );
    }
    
    public function testGetByNumericCode()
    {
        $isoCodes = new \Sokil\IsoCodes;
        $countries = $isoCodes->getCountries();
        
        $this->assertEquals(
            'Ukraine',
            $countries->getByNumericCode('804')->getName()
        );
    }
    
    public function testGetLocalByNumericCode()
    {
        putenv('LANGUAGE=uk_UA.UTF-8');
        putenv('LC_ALL=uk_UA.UTF-8');
        setlocale(LC_ALL, 'uk_UA.UTF-8');
        
        $isoCodes = new \Sokil\IsoCodes;
        $countries = $isoCodes->getCountries();
        
        $this->assertEquals(
            'Україна',
            $countries->getByNumericCode('804')->getLocalName()
        );
    }
}