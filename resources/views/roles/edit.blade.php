@extends('layout')


@section('content')
    <div class="col-8">
    <h2>Изменить роль</h2>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('role.update', ['role'=>$role->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-outline mb-4">
            Title:
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{$role->title}}">
        </div>

        <div class="form-outline mb-4">
            Alias:
            <input type="text" name="alias" placeholder="Alias" class="form-control" value="{{$role->alias}}">
        </div>
        <button type="submit" class="btn btn btn-success">Изменить</button>
    </form>
</div>

    </div>



@endsection