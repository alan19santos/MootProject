<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Marca;

class ProdutoFiltro extends Component
{
//     public $nome = '';
//     public $categoria_id = '';
//     public $marca_id = '';
//     public function render()
//     {
//         // dd($this->nome);
//         $produtos = Produto::with(['categoria', 'marca'])
//         ->when(!empty($this->nome), fn($q) => $q->where('nome','like', "%{$this->nome}%"))
//         ->when(!empty($this->categoria_id), fn($q) => $q->where('categoria_id', $this->categoria_id))
//         ->when(!empty($this->marca_id), fn($q) => $q->where('marca_id', $this->marca_id))
//         ->get();
// // dump([
// //         'nome digitado' => $this->nome,
// //         'total encontrados' => $produtos->count(),
// //     ]);
//         return view('livewire.produto-filtro', [
//             'produtos' => $produtos,
//             'categorias' => Categoria::all(),
//             'marcas'=> Marca::all(),
//         ]);
//     }

// {
    public $nome = '';
    public $categoria_id = [];
    public $marca_id = [];
    public $produtos = [];

    public function mount()
    {
        $this->filtrar(); // mostra tudo inicialmente
    }

    public function filtrar()
    {
        $this->produtos = Produto::with(['categoria', 'marca'])
            ->when(!empty($this->nome), fn($q) => $q->where('nome', 'like', "%{$this->nome}%"))
            ->when(!empty($this->categoria_id), fn($q) => $q->where('categoria_id', $this->categoria_id))
            ->when(!empty($this->marca_id), fn($q) => $q->where('marca_id', $this->marca_id))
            ->get();
    }

    public function render()
    {
        return view('livewire.produto-filtro', [
            'categorias' => Categoria::all(),
            'marcas' => Marca::all(),
        ]);
    }

    public function clearFilte() {
        $this->nome = '';
        $this->categoria_id = [];
        $this->marca_id = [];
        $this->filtrar();
    }
}
