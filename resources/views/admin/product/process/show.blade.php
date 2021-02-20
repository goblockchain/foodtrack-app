@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Acompanhamento</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <ul class="timeline">
                            @foreach($stepsProcess as $i => $p)
                                @if($i == 'laboratory')
                                    <li>
                                        <div class="timeline-badge danger"><i class="fa fa-flask"></i></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">{{ \App\Helpers::getProfileName($i) }}</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Laborarótio: {{ $p['company']->name }}</p>
                                                <p>Teste executado: {{ $p['test'] }}</p>
                                                <p>Data: {{ \App\Helpers::formataDataBR($p['date']) }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @elseif($i == 'transport')
                                    <li>
                                        <div class="timeline-badge danger"><i class="fa fa-truck"></i></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">{{ \App\Helpers::getProfileName($i) }}</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Transportadora: {{ $p['company']->name }}</p>
                                                <p>Motorista: {{ $p['origin']['name_driver'] }}</p>
                                                <p>Saiu de {{ $p['origin']['cargo_destination'] }} às {{ \App\Helpers::formataDataBR($p['origin']['date']) }}</p>
                                                <p>Chegou em {{ $p['destiny']['cargo_destination'] }} às {{ \App\Helpers::formataDataBR($p['destiny']['date']) }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @elseif($i == 'industry')
                                    <li>
                                        <div class="timeline-badge danger"><i class="fa fa-industry"></i></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">{{ \App\Helpers::getProfileName($i) }}</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Indústria: {{ $p['company']->name }}</p>
                                                <p>Data de validade: {{ \App\Helpers::formataDataBR($p['date_validity'], false) }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li>
                                        <div class="timeline-badge danger"><i class="fa fa-leaf"></i></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">{{ \App\Helpers::getProfileName($i) }}</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Produtor: {{ $stepsProcess[$i]['company']->name }}</p>
                                                <p><i class="fa fa-calendar-alt" aria-hidden="true"></i> Iniciado em {{ \App\Helpers::formataDataBR($p['date_s'], false) }}</p>
                                                <p><i class="fa fa-calendar-alt" aria-hidden="true"></i> Finalizado em {{ \App\Helpers::formataDataBR($p['date_f'], false) }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <h5 class="card-header">QrCode</h5>
                <div class="card-body p-0">
                    <img width="100%" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(600)->generate(url('/product/show/' . $process->id))) !!} ">
                </div>
            </div>
        </div>
    </div>
@endsection
