<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;


// Pest test ????
/*test('that true is true', function () {
    expect(true)->toBeTrue();
});*/

#[Test]
/** @test */

// creamos la clase ExampleTest que extiende de TestCase y que importamos arriba con use...
class ExampleTest extends TestCase{

    //métodos de la clase:
    public function testExample(){
        $this->assertTrue(true);
    }
}








