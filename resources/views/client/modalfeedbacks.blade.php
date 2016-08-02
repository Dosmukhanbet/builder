<div class="modal fade" id="masterfeedback_{{$master->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Отзывы мастеру {{$master->name}}</h4>
      </div>
      <div class="modal-body">
        @foreach($master->feedbacks as $feedback)
                <blockquote>
                      <p>{{$feedback->body}}
                        <br>
                         <span>{{$feedback->created_at->toFormattedDateString()}},
                          от клиента:  {{ $clients[$feedback->from_user_id] }} </span>
                      </p>
                </blockquote>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>