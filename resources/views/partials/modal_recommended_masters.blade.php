<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="recommendation_header"><i class="fa fa-check-square-o" aria-hidden="true"></i>Рекомендуемые мастера </h4>
                    </div>
                    <recommendations :catid="{{ $job->category_id }}" :jobid="{{$job->id}}" :jobownerid="{{$job->user->id}}"></recommendations>
              </div>
        </div>
 </div>