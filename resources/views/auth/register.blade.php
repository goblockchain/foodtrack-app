<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/libs/css/style.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->
<form method="POST" action="{{ route('register') }}" class="splash-container">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-1">Formulário de cadastro</h3>
            <p>Preencha os campos abaixo para criar sua conta.</p>
        </div>
        <div class="card-body">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-lg  @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Insira seu nome">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Insira seu email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg @error('profileType') is-invalid @enderror" name="profile_type" value="{{ old('email') }}" required placeholder="Selecione o tipo de perfil">
                    <option value="producer">Produtor</option>
                    <option value="laboratory">Laboratório</option>
                    <option value="transport">Transportadora</option>
                    <option value="industry">Indústria</option>
                </select>
                @error('profileType')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>






            <div class="form-group">
                <input class="form-control form-control-lg  @error('social_reason') is-invalid @enderror" type="text" name="social_reason" value="{{ old('social_reason') }}" required autocomplete="social_reason" autofocus placeholder="Insira a razão social">
                @error('social_reason')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="cpfcnpj" class="form-control form-control-lg  @error('cnpj_cpf') is-invalid @enderror" type="text" name="cnpj_cpf" value="{{ old('cnpj_cpf') }}" required autocomplete="cnpj_cpf" autofocus placeholder="Insira seu CPF ou CNPJ">
                @error('cnpj_cpf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input class="inputCep form-control form-control-lg  @error('zip_code') is-invalid @enderror" type="text" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code" autofocus placeholder="Insira seu cep">
                @error('zip_code')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input readonly id="address" class="form-control form-control-lg  @error('address') is-invalid @enderror" type="text" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Insira seu endereço">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <input readonly id="neighborhood" class="form-control form-control-lg  @error('neighborhood') is-invalid @enderror" type="text" name="neighborhood" value="{{ old('neighborhood') }}" required autocomplete="neighborhood" autofocus placeholder="Insira seu bairro">
                @error('neighborhood')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <input readonly id="state" class="form-control form-control-lg  @error('state') is-invalid @enderror" type="text" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus placeholder="Insira seu estado">
                @error('state')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input readonly id="city" class="form-control form-control-lg  @error('city') is-invalid @enderror" type="text" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="Insira sua cidade">
                @error('city')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input class="form-control form-control-lg  @error('number') is-invalid @enderror" type="number" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus placeholder="Insira seu número">
                @error('number')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <input class="form-control form-control-lg  @error('complement') is-invalid @enderror" type="text" name="complement" value="{{ old('complement') }}" autocomplete="complement" autofocus placeholder="Insira o complemento">
                @error('complement')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" placeholder="Insira sua senha">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Confirme sua senha">
            </div>
            <div class="form-group pt-2">
                <button class="btn btn-block btn-primary" type="submit">Criar minha conta</button>
            </div>
        </div>
        <div class="card-footer bg-white">
            <p>Já é membro? <a href="/login" class="text-secondary">Logue aqui.</a></p>
        </div>
    </div>
</form>

<script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha256-U0YLVHo5+B3q9VEC4BJqRngDIRFCjrhAIZooLdqVOcs=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="/assets/libs/js/jquery.mask.js"></script>

<script src="/assets/libs/js/custom.js"></script>
</body>


</html>
