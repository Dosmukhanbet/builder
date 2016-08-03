<h4 class="recommendation_header"><i class="fa fa-check-square-o" aria-hidden="true"></i>Рекомендуемые мастера </h4>
<recommendations :catid="{{ $job->category_id }}" :jobid="{{$job->id}}" :clients="{{$clients}}" :jobownerid="{{$job->user->id}}"></recommendations>


