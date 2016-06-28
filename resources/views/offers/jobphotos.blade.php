 <div class="Offer__block Images__block">
                                                    @foreach($job->photos as $photo)
                                                                  <a href="/{{$photo->path}}" data-lity>
                                                                   <img src="/{{$photo->thumbnail_path}}"  width="50px" class="img-thumbnail">
                                                                   </a>
                                                        @endforeach
                                
 </div>

  @unless($job->photos->count() >= 5)

                                 <form id="addPhotos" class="dropzone" action="/job/addphoto/{{$job->id}}">
                                    {{ csrf_field() }}
                                  </form>

                  @endunless