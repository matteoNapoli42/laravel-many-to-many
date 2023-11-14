@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class=" text-center mb-5">ADMIN CREATE</h1>
    <form action="{{route('projects.store')}}" method="POST" enctype="multipart/form-data">
        
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label"><h3>TITLE</h3></label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Inserisci il titolo del progetto" value="{{old('title')}}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label"><h3>DESCRIPTION</h3></label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="Inserisci una descrizione del progetto" value="{{old('description')}}">
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label"><h3>THUMB</h3></label>
            <input type="file" class="form-control" name="thumb" id="thumb" placeholder="" aria-describedby="cover_image_helper">
            <div id="cover_image_helper" class="form-text">Carica un immagine di copertina</div>
        </div>
        
        <div class="mb-3">
            <label for="series" class="form-label"><h3>GITHUB</h3></label>
            <input type="text" class="form-control" name="github" id="github" aria-describedby="helpId" placeholder="Inserisci il link di github" value="{{old('github')}}">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label"><h3>TECHNOLOGIES</h3></label>
            <input type="text" class="form-control" name="technologies" id="technologies" aria-describedby="helpId" placeholder="Inserisci le tecnologie utilizzate" value="{{old('technologies')}}">
        </div>

        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="type_id">
                <option selected>Select a project type</option>
                @foreach($all_types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
                
              </select>
        </div>
        <button type="submit" class="btn btn-success my-5">SAVE <a href="{{route('projects.index')}}"></a></button>

        @include('admin.partials.errors')
</div>
@endsection