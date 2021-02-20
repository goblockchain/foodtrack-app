@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Gráficos</h5>
                </div>
                <div class="col-md-12">
                    <form class="form-inline" id="submitReportSales">
                        <div class="form-group flex-column align-items-baseline">
                            <label for="inputDataInicialSales">Data inicial</label>
                            <input type="text" class="form-control mb-2 mr-sm-2 datepicker" id="inputDataInicial" placeholder="Selecione a data inicial" readonly>
                        </div>
                        <div class="form-group flex-column align-items-baseline">
                            <label for="inputDataFinalSales">Data final</label>
                            <input type="text" class="form-control mb-2 mr-sm-2 datepicker" id="inputDataFinal" placeholder="Selecione a data final" readonly>
                        </div>

                        <div class="form-group flex-column align-items-baseline">
                            <label for="inputDataFinalSales">Produto</label>
                            <select class="form-control mb-2 mr-sm-2 inputDate" id="inputProductId" placeholder="Selecione a data final" readonly>
                                @if(isset($products))
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2 mt-4">Buscar</button>

                    </form>
                    <canvas id="chartReport" width="100%" height="40px"></canvas>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="/assets/libs/js/chart.js?{{ time() }}"></script>
@endsection
