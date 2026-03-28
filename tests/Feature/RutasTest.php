<?php

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

// Testear rutas simples
test('la ruta home responde correctamente', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

// Testear redirecciones TODO
test('la ruta admin redirige a login si no estás autenticado', function () {
    $response = $this->get('/admin');

    $response->assertRedirect('/login');
});

// Testear que una vista se renderiza
test('la vista de login se muestra', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
    $response->assertViewIs('auth.login');
});

// Testear controladores
test('la página de contacto se muestra', function () {
    $response = $this->get('/contacto');

    $response->assertOk();
    $response->assertViewIs('contacto');
});

// Testear datos enviados a la vista TODO
test('la vista recibe productos', function () {
    $producto = \App\Models\Producto::factory()->create();

    $response = $this->get('/productos');

    $response->assertViewHas('productos', function ($productos) use ($producto) {
        return $productos->contains($producto);
    });
});

// Testear métodos POST (formularios) TODO
test('se puede enviar el formulario de contacto', function () {
    $response = $this->post('/contacto', [
        'nombre' => 'Juan',
        'email' => 'juan@example.com',
        'mensaje' => 'Hola!',
    ]);

    $response->assertRedirect('/gracias');
});


