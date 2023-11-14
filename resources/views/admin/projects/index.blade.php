@extends('layouts.admin')

@section('content')



<div class="mx-4">
    <h1 class=" text-center">ADMIN INDEX</h1>
    <a class=" btn btn-primary" href="{{route('projects.create')}}">ADD NEW PROJECT</a>
    <div class=" table-responsive">
        <table class=" table table-light mb-1"> 
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">THUMB</th>
                    <th scope="col">GITHUB</th>
                    <th scope="col">TECHNOLOGIES</th>
                    <th scope="col">TYPES</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td scope="col">{{$project->id}}</td>
                    <td scope="col">{{$project->title}}</td>
                    <td scope="col">
                        <img width="100px" src="{{$project->thumb}}" alt="">
                    </td>
                    <td scope="col">{{$project->description}}</td>
                    <td scope="col">{{$project->github}}</td>
                    <td scope="col">{{$project->technologies}}</td>
                    @if(is_null($project->type))
                    <td scope="col">N/D</td>
                    @else
                    <td scope="col">{{$project->type['name']}}</td>
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