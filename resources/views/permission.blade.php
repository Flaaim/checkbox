@extends('layout')


@section('content')
<div class="col-8">
    <form action="{{route('permission.store')}}" method="POST">
        @csrf
<table class="table">
<thead>
    <tr>
      
      <th scope="col">Permissions</th>
      @foreach($roles as $role)
      <th scope="col"  >{{$role->title}}</th>
      @endforeach
    </tr>

        
        @foreach($permissions as $permission)
        <tr>
            <td>
                {{$permission->title}}
            </td>
            @foreach($roles as $role)
                <td>@if($role->hasPerms($permission->alias))
                    <input checked type="checkbox" name="{{$role->id}}[]" value="{{$permission->id}}">
                    @else
                    <input type="checkbox" name="{{$role->id}}[]" value="{{$permission->id}}">
                    @endif
                </td>
            @endforeach
        </tr>

        @endforeach
    
</table>
<button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
</form>
</div>
@endsection