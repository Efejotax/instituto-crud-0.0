<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;


// creamos la clase ExampleTest que extiende de TestCase y que importamos arriba con use...
class DistanceConverterTest extends TestCase{

    //métodos de la clase, usamos atributo #[Test]:
    #[Test]
    public function Return_same_value_if_no_conversion_defined(){
        // TDD explicado por pasos (Given, When, Then):
        // 1- Given / Event o Arrange --> Dado / Preparar el escenario
        $distanceConverter = new DistanceConverter();

        // 2-  When / Act --> Cuando / Actuar
        $result = $distanceConverter->convert(100);

        // 3- Then / Assert --> Entonces / Afirmar
        $this->assertEquals(100, $result);
    }
}



