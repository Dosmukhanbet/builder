 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Отзыв</h4>
                                              </div>
                                              <div class="modal-body">
                                                <form>

                                                  <div class="form-group">
                                                    <label for="message-text" class="control-label">Оставьте отзыв для пользователя {{ $offer->user->name }}</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                  </div>
                                                </form>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">Отправить отзыв</button>
                                              </div>
               </div>
        </div>
 </div>