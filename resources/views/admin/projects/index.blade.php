@extends('layouts.admin')

@section('content')



<div class="mx-4">
    <h1 class=" text-center">ADMIN INDEX</h1>
    <a class=" btn btn-primary" href="{{route('projects.create')}}">ADD NEW PROJECT</a>
    <div class=" table-responsive">
        <table class=" table table-light mb-1"> 
            <thead>
                <tr>
                    <th scope="id">ID</th>
                    <th scope="title">TITLE</th>
                    <th scope="description">DESCRIPTION</th>
                    <th scope="thumb">THUMB</th>
                    <th scope="github">GITHUB</th>
                    <th scope="col">TECHNOLOGIES</th>
                    <th scope="types">TYPES</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td scope="id">{{$project->id}}</td>
                    <td scope="title">{{$project->title}}</td>
                    <td scope="description">{{$project->description}}</td>
                    
                    <td scope="thumb">
                        @if(str_contains($project->thumb, 'http'))
                            <img width="100px" src="{{$project->thumb}}" alt="">
                        @else
                            <img width="100px" src="{{asset('storage/' . $project->thumb)}}" alt="">
                        @endif
                    </td>
                    
                    <td scope="github">{{$project->github}}</td>
                    
                    @if($project->technologies->isEmpty())
                    <td scope="technologies">N/D</td>
                    @else
                    <td scope="technologies">
                        @foreach($project->technologies as $tech)
                            <span>{{$tech->name}}</span>
                        @endforeach
                    </td>
                    @endif
                    
                    @if(is_null($project->type))
                    <td scope="types">N/D</td>
                    @else
                    <td scope="types">{{$project->type['name']}}</td>
                    @endif
                    
                    
                   
                    <td>
                        <button class=" btn btn-secondary">
                            <a class=" text-white" href="{{route('projects.show', $project->id)}}">VIEW</a>
                        </button>
                    </td>
                    <td>
                        <button class=" btn btn-secondary">
                            <a class=" text-white" href="{{route('projects.edit', $project)}}">
                                EDIT
                            </a>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                        data-bs-target="#modalDestroy{{$project->id}}">
                            DESTROY
                         </button>
                    </td>
                </tr>
                
               <div class="modal fade" id="modalDestroy{{$project->id}}" tabindex="-1"
               data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modalTitle">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">
                                    DELETE PROJECT {{$project->id}}
                                </h5>
                                <button class="btn btn-danger" data-bs-dismiss="modal">X</button>
                            </div>
                            <div class="modal-body">
                                <span>Are you sure you want to delete {{$project->title}}?</span>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>

                                <form action="{{route('projects.destroy', $project)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        DELETE
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
            
                </div>
                
                
                @empty
                    <h1>No data to show</h1>
                @endforelse

            </tbody>
        </table>
    </div>
    @section('errors')
    @endsection


</div>
@endsection