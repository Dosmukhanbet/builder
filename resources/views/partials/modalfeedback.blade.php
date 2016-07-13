 <div class="modal fade col-md-8" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel">
        <div class="modal-dialog" role="document">
              <div class="modal-content">


                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Выберите мастера выполнившего Вашу заявку</h4>
                                              </div>

                                              <div class="modal-body">
                                              <jobmademasters :jobId="{{$job->id}}"></jobmademasters>
                                              </div>

                                              <div class="modal-footer">

                                              </div>

               </div>
        </div>
 </div>