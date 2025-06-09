<div>
    <div style="margin-bottom: 20px;">
        <input type="text" wire:model.defer="nome" placeholder="Buscar por nome..." />

        <select wire:model="categoria_id" multiple>
            <!-- <option value="">Todas as categorias</option> -->
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>

        <select wire:model="marca_id" multiple>
            <!-- <option value="">Todas as marcas</option> -->
            @foreach($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
            @endforeach
        </select>
        <button wire:click="filtrar">Pesquisar</button>
        <button wire:click="clearFilte">Limpar</button>
    </div>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            @forelse($this->produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->categoria?->nome ?? '—' }}</td>
                    <td>{{ $produto->marca?->nome ?? '—' }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum produto encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
