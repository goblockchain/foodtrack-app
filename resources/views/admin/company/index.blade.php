@extends('layouts.app')

@section('content')
<div class="card">
    <h5 class="card-header">Lista de empresas</h5>
    <div class="card-body p-0">
        <div class="col-md-12 mt-3 mb-3">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Buscar por tipo de perfil</label>
                    <select class="form-control form-control-lg" name="profile_type" placeholder="Selecione o tipo de perfil">
                        <option value="">Nenhum</option>
                        <option value="producer"{{ app('request')->input('profile_type') == 'producer' ? 'selected' : '' }} >Produtor</option>
                        <option value="laboratory" {{ app('request')->input('profile_type') == 'laboratory' ? 'selected' : '' }}>Laboratório</option>
                        <option value="transport" {{ app('request')->input('profile_type') == 'transport' ? 'selected' : '' }}>Transportadora</option>
                        <option value="industry" {{ app('request')->input('profile_type') == 'industry' ? 'selected' : '' }}>Indústria</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-light">
                <tr class="border-0">
                    <th class="border-0">#</th>
                    <th class="border-0">Nome</th>
                </tr>
                </thead>
                <tbody>
                    @if(isset($companys))
                        @foreach($companys as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mt-4">
            {{ $companys->links() }}
        </div>
    </div>
</div>
@endsection
