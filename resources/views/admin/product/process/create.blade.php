@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Criando processo para {{ $product->name }}</h5>
        <div class="card-body">
            <form action="{{ route('admin.product.process.producer.store', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">Início da plantação</label>
                    <input name="planting_s" required type="text" class="form-control datepicker">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Fim da plantação</label>
                    <input id="name" name="planting_f" required type="text" class="form-control datepicker">
                </div>




                <div class="form-group">
                    <label for="name" class="col-form-label">Início da fertilização</label>
                    <input id="name" name="fertilizer_s" required type="text" class="form-control datepicker">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Fim da fertilização</label>
                    <input id="name" name="fertilizer_f" required type="text" class="form-control datepicker">
                </div>




                <div class="form-group">
                    <label for="name" class="col-form-label">Início da colheita</label>
                    <input id="name" name="harvest_s" required type="text" class="form-control datepicker">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Fim da colheita</label>
                    <input id="name" name="harvest_f" required type="text" class="form-control datepicker">
                </div>




                <div class="form-group">
                    <label for="name" class="col-form-label">Início da herbicida</label>
                    <input id="name" name="herbicide_s" required type="text" class="form-control datepicker">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Fim da herbicida</label>
                    <input id="name" name="herbicide_f" required type="text" class="form-control datepicker">
                </div>




                <h3>Escolha o fluxo de rastreamento</h3>

                <div class="form-group">
                    <label for="selectOrganic">Escolha o laboratório</label>
                    <select class="form-control" name="laboratory">
                        <option value="">Selecione o laboratório</option>
                        @foreach($laboratory as $lab)
                            <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="selectOrganic">Escolha a transportadora</label>
                    <select class="form-control" name="transport">
                        <option value="">Selecione a transportadora</option>
                        @foreach($transport as $trans)
                            <option value="{{ $trans->id }}">{{ $trans->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="selectOrganic">Escolha a industrialização</label>
                    <select class="form-control" name="industry">
                        <option value="">Selecione a indústria</option>
                        @foreach($industry as $ind)
                            <option value="{{ $ind->id }}">{{ $ind->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection
