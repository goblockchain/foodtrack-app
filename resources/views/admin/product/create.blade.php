@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Conteúdo</h5>
        <div class="card-body">
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">Nome</label>
                    <input id="name" name="name" required type="text" class="form-control" placeholder="Ex: Tomate">
                </div>
                <div class="form-group">
                    <label for="preco">Tempetarura º</label>
                    <input name="temperature" required type="number" placeholder="Ex: 80" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição</label>
                    <textarea class="form-control" name="description" required id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="selectOrganic">Produto orgânico?</label>
                    <select class="form-control" name="organic">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="selectOrganic">Habilitar doação?</label>
                    <select class="form-control" name="donation">
                        <option value="">Não</option>
                        <option value="escolas">Escolas</option>
                        <option value="ongs">Ongs</option>
                        <option value="agricultores">Agricultores</option>
                        <option value="hospitais">Hospitais</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="inputEmail">Imagem</label>
                    <input required type="file" name="imagens[]" multiple class="form-control" id="gallery-photo-add">
                </div>

                <div class="row gallery form-group">

                </div>

                <button class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {
                $(placeToInsertImagePreview).html("")
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $(placeToInsertImagePreview).append(`<div class="col-md-3 gallery-item"><img src="${event.target.result}"></div>`)
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });
    </script>
@endsection
