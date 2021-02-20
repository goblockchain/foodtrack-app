@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Adicionando processo de transporte</h5>
        <div class="card-body">
            <form action="{{ route('admin.product.process.transport.store', $process->id) }}" method="post" enctype="multipart/form-data">
                <h3>Dados de origem</h3>

                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">Nome do motorista</label>
                    <input name="origin[name_driver]" required type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">CEP</label>
                    <input name="origin[zip_code]" required type="text" class="form-control inputCep" customCep="origin">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Destino da carga</label>
                    <input name="origin[cargo_destination]" required type="text" class="form-control" id="city-origin">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Estado</label>
                    <input name="origin[state]" required type="text" class="form-control" id="state-origin">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Endereço</label>
                    <input name="origin[address]" required type="text" class="form-control" id="address-origin">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Número</label>
                    <input name="origin[number]" required type="number" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Complemento</label>
                    <input name="origin[complement]" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Bairro</label>
                    <input name="origin[neighborhood]" required type="text" class="form-control" id="neighborhood-origin">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Data de saída</label>
                    <input name="origin[date]" required type="text" class="form-control datepicker">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Hora de saída</label>
                    <input name="origin[time]" required type="text" class="form-control timepicker">
                </div>



                <h3>Dados de destino</h3>



                <div class="form-group">
                    <label for="name" class="col-form-label">CEP</label>
                    <input name="destiny[zip_code]" required type="text" class="form-control inputCep" customCep="destiny">
                </div>


                <div class="form-group">
                    <label for="name" class="col-form-label">Destino da carga</label>
                    <input name="destiny[cargo_destination]" required type="text" class="form-control" id="city-destiny">
                </div>



                <div class="form-group">
                    <label for="name" class="col-form-label">Cidade</label>
                    <input name="destiny[city]" required type="text" class="form-control" id="city-destiny">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Estado</label>
                    <input name="destiny[state]" required type="text" class="form-control" id="state-destiny">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Endereço</label>
                    <input name="destiny[address]" required type="text" class="form-control" id="address-destiny">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Número</label>
                    <input name="destiny[number]" required type="number" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Complemento</label>
                    <input name="destiny[complement]" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Bairro</label>
                    <input name="destiny[neighborhood]" required type="text" class="form-control" id="neighborhood-destiny">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Data de saída</label>
                    <input name="destiny[date]" required type="text" class="form-control datepicker">
                </div>

                <div class="form-group">
                    <label for="name" class="col-form-label">Hora de saída</label>
                    <input name="destiny[time]" required type="text" class="form-control timepicker">
                </div>


                <button class="btn btn-primary">Prosseguir</button>
            </form>
        </div>
    </div>
@endsection
