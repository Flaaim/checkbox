@extends('layout')



@section('content')
<div class="col-8">
<h2>Roles</h2>
<a href="{{route('role.create')}}" class="btn btn btn-success">Создать</a>
<table class="table">
    <thead>
        <tr>
            <td>Id</td>
            <td>Title</td>
            <td>Alias</td>
            <td>Action</td>
        </tr>
    </thead>
   
        @foreach($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->title}}</td>
            <td>{{$role->alias}}</td>
            <td><a href="{{route('role.edit', ['role'=>$role->id])}}" class="btn btn-primary btn-labeled">Изменить</a>
            <form action="{{route('role.destroy', ['role'=>$role->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary btn-danger">Удалить</button>
            </form></td>
        </tr>
        @endforeach
    
</table>
</div>
@endsection