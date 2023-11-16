@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class=" text-center mb-5">ADMIN EDITING {{$project->id}}</h1>
    <form action="{{route('projects.update', $project)}}" method="POST" enctype="multipart/form-data">
        
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label"><h3>TITLE</h3></label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Inserisci il titolo del progetto" value="{{$project->title}}" >
        </div>

        <div class="mb-3">
            <label for="description" class="form-label"><h3>DESCRIPTION</h3></label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="Inserisci una descrizione del progetto" value="{{$project->description}}" >
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label"><h3>THUMB</h3></label>
            <input type="file" class="form-control" name="thumb" id="thumb" placeholder="" aria-describedby="cover_image_helper">
            <div id="cover_image_helper" class="form-text">Carica un immagine di copertina</div>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label"><h3>GITHUB</h3></label>
            <input type="text" class="form-control" name="github" id="github" aria-describedby="helpId" placeholder="Inserisci il link di github" value="{{$project->github}}" >
        </div>

        <div class="mb-3">
            <label for="project_link" class="form-label"><h3>PROJECT LINK</h3></label>
            <input type="text" class="form-control" name="project_link" id="project_link" aria-describedby="helpId" placeholder="Inserisci il link di github" value="{{$project->project_link}}">
        </div>

        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="type_id">
                <option selected value ="">Select a project type</option>
                @foreach($all_types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach($all_tech as $tech) 
                <input type="checkbox" class="btn-check" id="{{$tech->name}}" autocomplete="off" name="tech[]" value="{{$tech->id}}" {{$project->technologies->contains($tech) ? 'checked' : ''}}>
                <label class="btn btn-outline-primary" for="{{$tech->name}}">{{$tech->name}}</label>
                @endforeach
              </div>
        </div>

        

        <button type="submit" class="btn btn-success my-5">SAVE <a href="{{route('projects.index')}}"></a></button>

        @include('admin.partials.errors')
    </form>
</div>

@endsection