import VueResource from 'vue-resource';
import _ from 'underscore';
import sweetalert from  'sweetalert';
export default {
    template : `
    <div class="col-md-2 col-md-offset-1">
        <div class="categories">
            <form action="/" v-on:submit.prevent="findMasters">
                <div class="form-group">
                    <label>
                            Найти специалиста <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </label>
                    <select v-model="selectedCat" class="form-control">
                        <option v-for="cat in cats" :value="cat.id">{{cat.name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                            В городе <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </label>
                    <select v-model="selectedCity" class="form-control">
                        <option v-for="city in cities" :value="city.id">{{city.name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn find__button" type="submit">Найти</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
    <h4>Мастера</h4>
    <div v-show="!masters" class="alert alert-info" role="alert">Выберите категорию специалиста и город из списка, нажмите кнопку "Найти"</div>
    <div class='findedmasters' v-for="master in masters" v-show="masters">
              <p>
                  <a data-lity href="{{ makephotopath(master.photo_path) }}">
                <img class="img-circle" v-bind:src="makethumbpath(master.thumbnail_path)"></a>
              </p>

               <p><span>Имя:</span> {{master.name}}<br>
                <span>Мобильный номер:</span> +{{master.phone_number}}<br>
                <span>Специальность:</span>  {{ findCat(master.category_id) }}<br>
                <span>Город:</span>  {{ findCity(master.city_id) }}<br>

                <span v-show="master.ratings.length" >{{ ratingsum(master.ratings)}}</span><br v-show="master.ratings.length">
                <span v-show="master.ratings.length" class="ratingcounts">{{ratingcounts(master.ratings) }}</span><br v-show="master.ratings.length">
                <span v-show="master.feedbacks.length" >
                      <a class="feedbacks__link" data-toggle="modal" data-target="#masterfeedback_{{master.id}}">
                        Отзывы {{ master.feedbacks.length }}
                      </a>
                </span><br v-show="master.feedbacks.length">
               </p>

                                   <div class="modal fade" id="masterfeedback_{{master.id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                   <h4 class="modal-title" id="myModalLabel">Отзывы мастеру {{master.name}}</h4>
                                               </div>
                                               <div class="modal-body">
                                                   <blockquote v-for="feedback in master.feedbacks">
                                                       <p>{{feedback.body}}
                                                           <br>
                                                               <span>{{feedback.created_at}},
                                                               от клиента:  {{ findclient(feedback.from_user_id) }} </span>
                                                           </p>
                                                   </blockquote>
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

    </div>
    </div>
    `,


    props :['cats', 'masters', 'cities', 'clients'],

    data: function ()
          {
           return {
              selectedCat : '',
              selectedCity : ''
              }
              },

   ready(){
                    //console.log(this.clients);

                   },



    methods: {

       findMasters() {
           this.$http.post('/api/findmasters/' +this.selectedCat + '/' + this.selectedCity).then(function(response){
                console.log(response.data);
           if (_.isEmpty(response.data)){
                                      swal(  {title: "",
                                               text: "К сожалению поиск не дал результатов",
                                               timer: 1500,
                                               showConfirmButton: false });
                                   }
                                   else {
                                   this.masters = response.data;
                                   }

                                   });

                      } ,
         makethumbpath(path){
           if(path) { return '/' + path;}
                   else
                   {   return "/profile/sitephotos/thumb-no-photo.jpg";}

                   },
        makephotopath(path){
                   if(path) { return '/' + path;}
                   else
                   {   return "/profile/sitephotos/no-photo.jpg";}

                   },

        findCat(id){
                       return _.findWhere(this.cats, {id: id}).name;
                   },

       findCity(id){
                   return _.findWhere(this.cities, {id: id}).name;
                   },

       findclient(id){
                     return _.findWhere(this.clients, {id: id}).name;
         },

        ratingsum (rating) {

                           var sum = 0;
                            _.each(rating, function(el){
                                   sum += el.points;
                                   });
                            if ( sum > 0 )
                            {

                                return "Средняя оценка: "+ (sum / rating.length).toFixed(1);
                            }
                   },

       ratingcounts (rating ) {
                   var five = 0;
                   var four = 0;
                   var three = 0;

                   _.each(rating, function(el){
                            if (el.points == '5') {
                           five += 1;
                           }

                           if (el.points == '4') {
                           four += 1;
                           }

                           if (el.points == '3') {
                           three += 1;
                           }
                   });

                    return (five ? 'Оценка 5 - ' + five + ' клиент(а) ' : '')
                            + ( four ? 'Оценка 4 - ' + four + ' клиент(а) ' : '' )
                            + (three ? 'Оценка 3 - ' + three  + ' клиент(а) ' : '');
                   }


                   


    }






}