@extends('layouts.app')
@section('title' , 'Products')

@section('content')
    @include('components.filter')

    @if ($errors->all())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger p-1 px-3 my-2" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @include('components.modal')
    @include('components.table')
@endsection
