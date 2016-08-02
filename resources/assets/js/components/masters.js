import VueResource from 'vue-resource';
import _ from 'underscore';
export default {
    template : `
    <div class="col-md-2 col-md-offset-1">
        <h4>Категории</h4>
        <div class="categories">
            <a v-for="cat in cats" @click="findmaster(cat.id)">{{cat.name}}<span class="user_length"> ({{cat.user.length}})</span></a>
        </div>
    </div>
    <div class="col-md-4">
    <h4>Мастера по категориям</h4>
    <div class='findedmasters' v-for="master in masters" v-show="masters">
              <p>
                  <a data-lity href="{{ makephotopath(master.photo_path) }}">
                <img class="img-circle" v-bind:src="makethumbpath(master.thumbnail_path)"></a>
              </p>

               <p><span>Имя:</span> {{master.name}}<br>
                <span>Мобильный номер:</span> +{{master.phone_number}}<br>
                <span>Специальность:</span>  {{ findCat(master.category_id) }}<br>
                 <span>Город:</span>  {{ findCity(master.city_id) }}<br>
                 <span>{{ ratingsum(master.ratings)}} </span>
                 <span>{{ratingcounts(master.ratings)}}</span>
             </p>

    </div>
    </div>
    `,


    props :['cats', 'masters', 'cities'],


   ready(){

                   this.masters = this.findmaster(2);
                   },



    methods: {

        findmaster(id) {
            this.$http.post('/api/findmasters/'+id).then(function(response){

                this.masters = response.data;
                   console.log(response.data.ratings);

            });
        },
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

       ratingsum (rating) {

                           var sum = 0;
                            _.each(rating, function(el){
                                   sum += el.points;
                                   });
                            if ( sum > 0 )
                            {

                                return "Средний балл: "+ (sum / rating.length).toFixed(1);
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

                    return (five ? '5-' + five + ', ': '')
                            + ( four ? '4-' + four  + ', ' : '' )
                            + (three ? '3-' + three : '');
                   }


                   


    }






}