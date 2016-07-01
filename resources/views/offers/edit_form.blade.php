 {{ Form::model($job, [ 'url' => 'job/'.$job->id, 'method' => 'PATCH']) }}
    <div class="form-group">
        {{ Form::label('Кратко о работе:', null, ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('Описание:', null, ['class' => 'control-label']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('Категория:', null, ['class' => 'control-label']) }}
        {{ Form::select('size', $categories, null, ['placeholder' => 'Выберите категорию']) }}
    </div>
    <div class="form-group">
        {{ Form::label('Дата/Время исполнения:', null, ['class' => 'control-label']) }}
        {{ Form::text('dateOfMake', null, ['class' => 'form-control', 'id' => 'datetimepicker']) }}
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Редактировать</button>
    </div>
 {{Form::close()}}