@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{{ config('app.name') }} Dashboard</h4>
                    </div>
                </div><!-- /.card -->

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex justify-content-between align-content-center">
                                <h4>Projects</h4>
                                {{-- <a href="{{ route('tenant.projects.create') }}">Create new project</a> --}}
                            </div>
                        </div><!-- /.card-title -->
                    </div><!-- /.card-body -->
                   
                    <div class="list-group list-group-flush">
                        {{-- @foreach($projects as $project) --}}
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ route('tenant.library.client' , session('tenant') ) }}"> Clients </a>                                                            
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">                                   
                                <a href="{{ route('tenant.library.book', session('tenant') ) }}"> Books </a>                                                                      
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">                        
                                <a href="{{ route('tenant.library.loands', session('tenant') ) }}"> Loands </a>                                       
                            </div>
                        {{-- @endforeach --}}
                    </div><!-- /.list-group -->
                  
                </div><!-- /.card -->
            </div>
        </div>
    </div>
@endsection