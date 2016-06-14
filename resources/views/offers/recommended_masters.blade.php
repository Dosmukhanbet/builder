<h4 class="recommendation_header"><i class="fa fa-check-square-o" aria-hidden="true"></i>Рекомендуемые мастера </h4>
<recommendations :catid="{{ $offers[0]->job->category_id }}" :jobid="{{$offers[0]->job->id}}" :jobownerid="{{$offers[0]->job->user->id}}"></recommendations>


