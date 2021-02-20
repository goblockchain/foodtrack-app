@extends('layouts.app')

@section('content')
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
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->product->name }}</td>
                                @if($p->processComplete == '1')
                                    <td>Fluxo completo</td>
                                @else
                                    <td>Fluxo em andamento</td>
                                @endif
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.product.process.show', ['product_id' => $p->product->id, 'id' => $p->id]) }}">Ver</a>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
