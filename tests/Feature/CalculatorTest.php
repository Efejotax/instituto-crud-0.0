<?php

it('has calculator page', function () {
    $response = $this->get('/calculator');

    $response->assertStatus(200);
});

//Esto funciona perfecto si la ruta /calculator redirige (por ejemplo, a login).
it('sumar dos numeros', function () {
    $response = $this->get('/calculator');

    $response->assertStatus(302);
});

// validar redirección y destino
it('redirige a login cuando se accede a calculator sin autenticación', function () {
    $this->get('/calculator')
        ->assertRedirect('/login');
});

//validar respuesta correcta de una ruta que suma números  GET /calculator/sum?x=2&y=3
it('suma dos números correctamente', function () {
    $response = $this->get('/calculator/sum?x=2&y=3');

    $response->assertStatus(200);
    $response->assertJson([
        'result' => 5,
    ]);
});

// con usuario autenticado
use App\Models\User;
it('permite acceder a calculator cuando el usuario está autenticado', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/calculator')
        ->assertStatus(200);
});






