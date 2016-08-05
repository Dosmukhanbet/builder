@extends('layouts.app')

@section('content')
<ul>
    @foreach($users->groupBy('city_id') as $usersgroup)
      {{dd($usersgroup)}}
            @foreach($usersgroup as $user)
            {{$user->name}}
            @endforeach
    @endforeach
</ul>
@stop