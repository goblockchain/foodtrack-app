@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->profile_type == 'producer')
        @include('admin.components.homeProducer')
    @else
        @include('admin.components.homeSteps')
    @endif
@endsection
