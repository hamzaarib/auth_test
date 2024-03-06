@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text text-info">Add New Student</h1>
                <p class="text-end">
                    <a href="{{route('habitants.list')}}" class="btn btn-danger">Back</a>
                </p>
                <hr>
                {{-- message the errors --}}
                @if($errors->any())
                <div class="container w-75">
                    <div class="alert alert-danger">
                        <h3>Errors:</h3>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <form action="/create" method="post" class="container w-75" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="cin" value="{{old('cin')}}" placeholder="Votre Cin..." class="form-control">
                        @error('cin')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" name="nom" value="{{old('nom')}}" placeholder="Votre Nom..." class="form-control mb-3">
                        @error('nom')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" name="prenom" value="{{old('prenom')}}" placeholder="Votre Prenom..." class="form-control mb-3">
                        @error('prenom')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select name="ville_id" class="form-control mb-3">
                            <option value="-1" hidden>Select Ville</option>
                            @foreach ($villes as $ville)
                                <option value="{{$ville->id}}">{{$ville->ville}}</option>
                            @endforeach
                        </select>
                        @error('ville_id')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control mb-3" name="image">
                        @error('image')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-outline-success">Save</button>
                </form>
                </p>
            </div>
        </div>
    </div>
@stop