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

    <div id="app">
        <modal-component></modal-component>
    </div>
    
    @include('components.table')
@endsection
