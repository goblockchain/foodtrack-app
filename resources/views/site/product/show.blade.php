<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/site/process.css">
</head>


@if(isset($process->product->images))
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($process->product->images as $i => $image)
        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
            <img src="/uploads/product-images/{{ $image->name }}" class="d-block w-100" alt="...">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
</div>
@endif

<div class="container">
    <h1 class="text-center mt-4">{{ $process->product->name }}</h1>
</div>


@if(isset($process->product->donation))
<section id="donation">
    <h1 class="text-center">Fazer doações para hospitais?</h1>
    <div id="donation_content">
        <div class="donation-item">R$ 1</div>
        <div class="donation-item">R$ 2</div>
        <div class="donation-item">R$ 3</div>
    </div>
</section>
@endif
<section id="cd-timeline" class="cd-container">
    @foreach($stepsProcess as $i => $p)
        @if($i == 'laboratory')

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                    <i class="fa fa-flask"></i>
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>{{ \App\Helpers::getProfileName($i) }}</h2>
                    <p>Laboratório: {{ $p['company']->name }}</p>
                    <p>Teste executado: {{ $p['test'] }}</p>
                    <p>Data: {{ \App\Helpers::formataDataBR($p['date']) }}</p>
                    <span class="cd-date">Jan 14</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block -->

        @elseif($i == 'transport')

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-picture.svg" alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>{{ \App\Helpers::getProfileName($i) }}</h2>
                    <p>Transportadora: {{ $p['company']->name }}</p>
                    <p>Motorista: {{ $p['origin']['name_driver'] }}</p>
                    <p>Saiu de {{ $p['origin']['cargo_destination'] }} às {{ \App\Helpers::formataDataBR($p['origin']['date']) }}</p>
                    <p>Chegou em {{ $p['destiny']['cargo_destination'] }} às {{ \App\Helpers::formataDataBR($p['destiny']['date']) }}</p>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block -->

        @elseif($i == 'industry')

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                    <i class="fa fa-industry"></i>
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>{{ \App\Helpers::getProfileName($i) }}</h2>
                    <p>Indústria: {{ $p['company']->name }}</p>
                    <p>Data de validade: {{ \App\Helpers::formataDataBR($p['date_validity'], false) }}</p>
                    <span class="cd-date">Jan 14</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block -->

        @else

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                    <i class="fa fa-leaf"></i>
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>{{ \App\Helpers::getProfileName($i) }}</h2>
                    <p>Produtor: {{ $p['company']->name }}</p>
                    <p><i class="fa fa-calendar-alt" aria-hidden="true"></i> Iniciado em {{ \App\Helpers::formataDataBR($p['date_s'], false) }}</p>
                    <p><i class="fa fa-calendar-alt" aria-hidden="true"></i> Finalizado em {{ \App\Helpers::formataDataBR($p['date_f'], false) }}</p>
                    <span class="cd-date">Jan 14</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block -->
        @endif
    @endforeach




    <!--
    <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-picture.svg" alt="Picture">
        </div>
        <div class="cd-timeline-content">
            <h2>Title of section 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
            <a href="#0" class="cd-read-more">Read more</a>
            <span class="cd-date">Jan 14</span>
        </div>
    </div>
    -->








</section> <!-- cd-timeline -->

<script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="/assets/site/process.js"></script>
