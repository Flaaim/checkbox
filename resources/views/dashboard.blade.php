@extends('layout')


@section('content')

<div class="col-10">
<form action="{{route('dashboard.store')}}" method="POST">
    @csrf
    <table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col" class="text-center" colspan="{{count($roles)}}">Role </th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
            @foreach($roles as $role)
                <td> <input type="checkbox" name="{{$user->id}}[]" 
                value="{{ $role->id }}"> {{$role->title}}</td>
            @endforeach
    </tr>
    @endforeach
  </thead>
    </table>
<button type="submit"  class="btn btn-primary btn-block mb-4">Submit</button>
</form>
</div>
@endsection