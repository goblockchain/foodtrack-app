@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Adicionando processo de industrialização</h5>
        <div class="card-body">
            <form action="{{ route('admin.product.process.industry.store', $process->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">Data de validade do produto</label>
                    <input name="date_validity" required type="text" class="form-control datepicker">
                </div>

                <button class="btn btn-primary">Prosseguir</button>
            </form>
        </div>
    </div>
@endsection
