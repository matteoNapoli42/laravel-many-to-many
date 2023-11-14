@extends('layouts.admin')

@section('content')
<h1 class=" text-center mb-5">PROJECT {{$project->id}} DETAILS</h1>
<div class="container mx-auto d-flex">
    <div class="col-6">
        <img width="80%" src="{{$project->thumb}}" alt="">
    </div>
    <div class="col-6 d-flex flex-column">
        <h3>{{$project->title}}</h3>
        <p>Descrizione : {{$project->description}}</p>
        <span>GitHub :  <a href=""> {{$project->github}}</a></span>
        <span>Tecnologie :{{$project->technologies}}</span>
    </div>
   
</div>
@endsection