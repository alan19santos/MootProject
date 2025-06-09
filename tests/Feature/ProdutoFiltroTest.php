<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Livewire\ProdutoFiltro;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Produto;
use Livewire\Livewire;
use Tests\TestCase;

class ProdutoFiltroTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     *
     * Teste de renderização de componentes
     * @return void
     */
    public function test_component_renders_properly()
    {
        Livewire::test(ProdutoFiltro::class)
            ->assertStatus(200)
            ->assertSee('Buscar por nome...');
    }


    /**
     * Summary of test_filtra_produto_por_nome
     * @return void
     */
    public function test_filtra_produto_por_nome()
    {
        Produto::factory()->create(['nome' => 'Camiseta Vermelha']);
        Produto::factory()->create(['nome' => 'Calça Azul']);

        Livewire::test(ProdutoFiltro::class)
            ->set('nome', 'Camiseta')
            ->call('filtrar')
            ->assertSee('Camiseta Vermelha')
            ->assertDontSee('Calça Azul');
    }

    /**
     * Summary of test_filtra_por_categoria
     * @return void
     */
    public function test_filtra_por_categoria()
    {
        $cat1 = Categoria::factory()->create();
        $cat2 = Categoria::factory()->create();

        Produto::factory()->create(['nome' => 'Produto A', 'categoria_id' => $cat1->id]);
        Produto::factory()->create(['nome' => 'Produto B', 'categoria_id' => $cat2->id]);

        Livewire::test(ProdutoFiltro::class)
            ->set('categoria_id', [$cat1->id])
            ->call('filtrar')
            ->assertSee('Produto A')
            ->assertDontSee('Produto B');
    }


    /**
     * Summary of test_filtra_por_varias_marcas
     * @return void
     */
    public function test_filtra_por_varias_marcas()
    {
        $marca1 = Marca::factory()->create();
        $marca2 = Marca::factory()->create();
        $marca3 = Marca::factory()->create();

        Produto::factory()->create(['nome' => 'Produto X', 'marca_id' => $marca1->id]);
        Produto::factory()->create(['nome' => 'Produto Y', 'marca_id' => $marca2->id]);
        Produto::factory()->create(['nome' => 'Produto Z', 'marca_id' => $marca3->id]);

        Livewire::test(ProdutoFiltro::class)
            ->set('marca_id', [$marca1->id, $marca2->id])
            ->call('filtrar')
            ->assertSee('Produto X')
            ->assertSee('Produto Y')
            ->assertDontSee('Produto Z');
    }


    /**
     * Summary of test_limpa_os_filtros
     * @return void
     */
    public function test_limpa_os_filtros()
    {
        $produto = Produto::factory()->create(['nome' => 'Produto Teste']);

        Livewire::test(ProdutoFiltro::class)
            ->set('nome', 'Qualquer coisa')
            ->call('clearFilter')
            ->assertSet('nome', '')
            ->assertSee($produto->nome);
    }


}
