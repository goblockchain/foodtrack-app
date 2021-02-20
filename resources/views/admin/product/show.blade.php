@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">{{ $product->name }}</h5>
                    <a href="/admin/product/show/{{ $product->id }}/process/create" class="btn btn-primary btn-sm">Adicionar processo</a>
                </div>
                <div class="card-body">
                    <p>Criado em: {{ \App\Helpers::formataDataBR($product->created_at) }}</p>
                    <p>Descrição: {{ $product->description }}</p>
                    <p>Temperatura: {{ $product->temperature }}º</p>
                    <p>Imagens:</p>
                    <div class="row gallery form-group">
                        @if(isset($product->images))
                            @foreach($product->images as $image)
                                <div class="col-md-3 gallery-item mb-4">
                                    <img src="/uploads/product-images/{{ $image->name }}" style="max-width: 100%">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Últimos processos</h5>
                </div>
                <div class="card-body">
                    @if(isset($process) && count($process) > 0)
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Criado em</th>
                                <th>Ação</th>
                            </tr>
                            @foreach($process as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->created_at }}</td>
                                    <td><a href="{{ route('admin.product.process.show', ['product_id' => $product->id, 'id' => $p->id]) }}" class="btn btn-primary btn-sm">Acompanhar</a></td>
                                </tr>

                            @endforeach
                        </table>

                    @endif
                </div>
            </div>
        </div>
        <!--
        <div class="col-md-3">
            <div class="card">
                <h5 class="card-header">QrCode</h5>
                <div class="card-body p-0">
                    <img width="100%" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(600)->generate(url('/product/show/' . $product->id))) !!} ">
                </div>
            </div>
        </div>
        -->
    </div>
@endsection