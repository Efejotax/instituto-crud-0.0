<?php

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('la página de inicio carga correctamente', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

