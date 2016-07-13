 <div class="col-md-9">
     {{ Form::model(Auth::user(), [ 'url' => 'editprofile/'.Auth::user()->id, 'method' => 'PATCH']) }}
        <div class="form-group">
            {{ Form::label('Имя:', null, ['class' => 'control-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('Электронная почта:', null, ['class' => 'control-label']) }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('Город:', null, ['class' => 'control-label']) }}
            {{ Form::select('city_id', $cities, null, ['placeholder' => 'Выберите категорию']) }}
        </div>
        <div class="form-group">
                {{ Form::label('Специальность:', null, ['class' => 'control-label']) }}
                {{ Form::select('category_id', $categories, null, ['placeholder' => 'Выберите категорию']) }}
        </div>

        <div class="col-md-9">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Редактировать</button>
            </div>
        </div>
     {{Form::close()}}
 </div>