@extends('layout')


@section('content')

<div class="col-8">
    <h2>Создать роль</h2>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('role.store')}}" method="POST">
        @csrf
        <div class="form-outline mb-4">
            Title:
            <input type="text" name="title" placeholder="Title" class="form-control">
        </div>

        <div class="form-outline mb-4">
            Alias:
            <input type="text" name="alias" placeholder="Alias" class="form-control">
        </div>
        <button type="submit" class="btn btn btn-success">Создать</button>
    </form>
</div>



@endsection