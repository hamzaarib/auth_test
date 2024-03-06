@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <p class="text-end">
                    <a href="{{route('habitants.list')}}" class="btn btn-danger">Back</a>
                </p>
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
                <form action="{{route('habitants.update',$habitant->id)}}" method="post" class="container w-75" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- <input type="file" class="form-control mb-3" name="image" value="{{$habitant->image}}"> --}}
                    <label for="picture">
                        <img src="{{ asset('storage/'.$habitant->image) }}" alt="no" width="50">
                        <input type="file" name="image" id="picture" hidden><br><br>
                    </label>
                    <div class="mb-3">
                        <input type="text" value="{{$habitant->cin}}" name="cin" class="form-control">
                        @error('cin')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" value="{{$habitant->nom}}" name="nom" class="form-control">
                        @error('nom')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" value="{{$habitant->prenom}}" name="prenom" class="form-control">
                        @error('prenom')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select name="ville_id" class="form-control mb-3">
                            <option value="-1" hidden>Select Ville</option>
                            @foreach ($villes as $ville)
                                <option 
                                <?php if($habitant->ville_id==$ville->id)  echo "selected" ?>
                                value="{{$ville->id}}">{{$ville->ville}}</option>
                            @endforeach
                        </select>
                        @error('ville_id')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <button class="btn btn-outline-success">Save Change</button>
                </form>
            </div>
        </div>
    </div>
@stop
