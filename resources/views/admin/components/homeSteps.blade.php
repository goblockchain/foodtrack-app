<div class="card">
    <h5 class="card-header">Processos</h5>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-light">
                <tr class="border-0">
                    <th class="border-0">#</th>
                    <th class="border-0">Nome do produto</th>
                    <th class="border-0">Status</th>
                    <th class="border-0">Ação</th>
                </tr>
                </thead>
                <tbody>
                    @if(isset($process) && !empty($process))
                        @foreach($process as $p)
                            <tr>
                                <td>{{ $p->processId }}</td>
                                <td>{{ $p->productName }}</td>
                                @if($p->processComplete == '1')
                                    <td>Fluxo completo</td>
                                @else
                                <td>{{ $p->orderActual == $p->orderProfile ? "Liberado para inserção de dados" : "Inserção de dados indisponível" }}</td>
                                @endif
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.product.process.show', ['product_id' => $p->productId, 'id' => $p->processId]) }}">Ver</a>
                                    @if($p->orderActual == $p->orderProfile && !$p->processComplete)
                                        <a class="btn btn-primary" href="{{ route("admin.product.process.". \Illuminate\Support\Facades\Auth::user()->profile_type .".create", $p->processId) }}">Adicionar processo</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
