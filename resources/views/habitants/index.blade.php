@extends('layouts.app')
@section('content')
<div class="container m-5 auto">
    <h1 class="alert alert-secondary text-center">Listes Des Produits</h1>
    <p class="text-end">
        <a href="{{route('habitants.create')}}" class="btn btn-outline-dark">Add New</a>
        @if(session('msg'))
            <h3 class="alert alert-success text-center">{{session('msg')}}</h3>
        @endif
        @if(session('msgupdate'))
            <h3 class="alert alert-primary text-center">{{session('msgupdate')}}</h3>
        @endif
        @if(session('msgdelete'))
            <h3 class="alert alert-danger text-center">{{session('msgdelete')}}</h3>
        @endif
    </p>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Cin</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>
        @foreach($habitants as $habitant)
            <tr>
                <td>{{$habitant->id}}</td>
                <td>
                    <img src="{{ asset('storage/' . $habitant->image) }}" height="40px" width="40px">
                </td>
                <td>{{$habitant->cin}}</td>
                <td>{{$habitant->nom}}</td>
                <td>{{$habitant->prenom}}</td>
                <td>{{$habitant->villeName->ville}}</td>
                <td>
                    {{-- <a class="btn btn-outline-primary" href="{{URL('edit',$habitant->id)}}">edit</a> --}}
                    {{-- <a class="btn btn-outline-danger" href="{{URL('delete',$habitant->id)}}" onclick="return confirm('are you sure ?')">delete</a> --}}
                    <a class="btn btn-outline-info" href="{{route('habitants.edit',$habitant->id)}}">edit</a>
                    <a class="btn btn-outline-danger" href="{{route('habitants.destroy',$habitant->id)}}" onclick="return confirm('are you sure ?')">delete</a>
                </td>
            </tr>
        @endforeach
        <tr>
            <th colspan="7">{{$habitants->links()}}</th>
        </tr>
    </table> 
</div>
@endsection
