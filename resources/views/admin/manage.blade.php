@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-md-4 col-md-offset-1">
            <h3>Добавить категорию</h3>
            <form method="POST" action="addCategories">
            {{csrf_field()}}
            <div class="form-group">
                <input type="name" class="form-control" name="name">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-warning __button"> + Add  </button>
              </div>
            </form>
            @foreach($categories as $id => $name)
                    <p>{{$name}}</p>
            @endforeach
        </div>

        <div class="col-md-4"><h3>Добавить город</h3>
        <form method="POST" action="addCities">
        {{csrf_field()}}
        <div class="form-group">
        <input type="name" class="form-control" name="name">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-warning __button"> + Add  </button>
          </div>
        </form>
        @foreach($cities as $id => $name)
                <p> {{$name}}</p>
        @endforeach
        </div>
        </div>
@stop