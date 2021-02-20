<a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-2 pull-right">Cadastrar produto</a>
<div class="card">
    <h5 class="card-header">Últimos produtos</h5>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-light">
                <tr class="border-0">
                    <th class="border-0">#</th>
                    <th class="border-0">Nome</th>
                    <th class="border-0">Temperatura</th>
                    <th class="border-0">Data se inserção</th>
                    <th class="border-0">Ação</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($products) && !empty($products))
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->temperature }}º</td>
                            <td>{{ \App\Helpers::formataDataBR($product->created_at, false) }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.product.show', $product->id) }}">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>