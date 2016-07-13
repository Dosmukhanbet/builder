<div class="col-md-6">
    @foreach($feedbacks as $feedback)
    <div class="feedback">
    <blockquote>
      <p>{{$feedback->body}}
        <br>
         <span>{{$feedback->created_at->toFormattedDateString()}},
          от клиента:  {{ $clients[$feedback->from_user_id] }} </span>
      </p>
    </blockquote>
    </div>
    @endforeach
    {{$feedbacks->links()}}
</div>