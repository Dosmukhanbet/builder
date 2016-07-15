 <div class="Offer__block Images__block" style="padding-bottom: 10px">
                                                    @foreach($job->photos as $photo)
                                                                  <a href="/{{$photo->path}}" data-lity>
                                                                   <img src="/{{$photo->thumbnail_path}}"  width="70px" class="image img-thumbnail">
                                                                   </a>

                                                     @endforeach

 </div>

  @unless($job->photos->count() >= 5)

                                 <form id="addPhotos" class="dropzone" action="/job/addphoto/{{$job->id}}">
                                    {{ csrf_field() }}
                                  </form>
 @endunless