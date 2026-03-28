<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class)->in('Feature');

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

// Mi primer test de pruebas con base de datos
test('se puede crear un usuario', function () {
    $user = User::factory()->create();

    expect($user->id)->not->toBeNull();
});


// Un ususario puede tener posts TODO
use App\Models\Post;
// Testear relaciones entre modelos
/*public function posts()
{
    return $this->hasMany(Post::class);
}*/
test('un usuario puede tener posts', function () {
    $user = User::factory()->create();

    $post = Post::factory()->create([
        'user_id' => $user->id,
    ]);

    expect($user->posts)->toHaveCount(1);
    expect($user->posts->first()->id)->toBe($post->id);
});


// La página de productos muestra productos TODO
use App\Models\Producto;
// Testear endpoints que usan la base de datos
/*Route::get('/productos', function () {
    return view('productos.index', [
        'productos' => \App\Models\Producto::all(),
    ]);
});*/
test('la página de productos muestra productos', function () {
    $producto = Producto::factory()->create();

    $response = $this->get('/productos');

    $response->assertStatus(200);
    $response->assertViewHas('productos', function ($productos) use ($producto) {
        return $productos->contains($producto);
    });
});


