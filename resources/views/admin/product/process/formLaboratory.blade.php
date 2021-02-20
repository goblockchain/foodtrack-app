@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Adicionando processo de laboratório</h5>
        <div class="card-body">
            <form action="{{ route('admin.product.process.laboratory.store', $process->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">Nome do teste</label>
                    <input name="test" required type="text" class="form-control">
                </div>

                <button class="btn btn-primary">Prosseguir</button>
            </form>
        </div>
    </div>
@endsection
