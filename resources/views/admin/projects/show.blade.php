@extends('layouts.admin')

@section('content')
<h1 class=" text-center mb-5">PROJECT {{$project->id}} DETAILS</h1>
<div class="container mx-auto d-flex">
    <div class="col-6">
        @if(str_contains($project->thumb, 'http'))
                            <img width="80%" src="{{$project->thumb}}" alt="">
                        @else
                            <img width="80%" src="{{asset('storage/' . $project->thumb)}}" alt="">
                        @endif
    </div>
    <div class="col-6 d-flex flex-column">
        <h3>{{$project->title}}</h3>
        <p>Descrizione : {{$project->description}}</p>
        <span>GitHub :  <a href=""> {{$project->github}}</a></span>
        <span>Tipologia di progetto : {{$project->type->name}}</span>
        <span>Tecnologie :
            @foreach($project->technologies as $tech)
            {{$tech->name}}
            @endforeach
        </span>
    </div>
   
</div>
@endsection