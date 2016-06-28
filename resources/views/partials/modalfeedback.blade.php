 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Отзыв</h4>
                                              </div>
                                              <div class="modal-body">
                                                <form method="POST" action="/feedbacks/leave">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="{{$offer->user->id}}" name="user_id" id="from_user_id">
                                                  <div class="form-group">
                                                    <label for="message-text" class="control-label">Оставьте отзыв для мастера {{ $offer->user->name }}</label>
                                                    <textarea class="form-control" id="message-text" name="body"></textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                     <button type="submit" class="btn btn-primary">Отправить отзыв</button>
                                                  </div>
                                                </form>
                                              </div>

               </div>
        </div>
 </div>