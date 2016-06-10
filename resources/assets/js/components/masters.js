import VueResource from 'vue-resource';

export default {
    template :`
    <div class="col-md-2">
        <h4>Категории</h4>
        <div class="categories">
            <a v-for="cat in cats" @click="findmaster(cat.id)">{{cat.name}}<span class="user_length"> ({{cat.user.length}})</span></a>
        </div>
    </div>
    <div class="col-md-5">
    <h4>Мастера</h4>
    <div class='findedmasters' v-for="master in masters" v-show="masters">
              <p>
                  <a data-lity href="{{ makephotopath(master.photo_path) }}">
                <img class="img-thumbnail" src="{{ makethumbpath(master.thumbnail_path) }}"></a>
              </p>

               <p><span>Имя:</span> {{master.name}}<br>
                <span>Мобильный номер:</span> +{{master.phone_number}}<br>
                <span>Электронный адрес:</span> {{master.email}}<br>
               </p>

    </div>
    </div>
    `,


    props :['cats', 'masters'],


    methods: {

        findmaster(id) {
            this.$http.post('/api/findmasters/'+id).then(function(response){

                this.masters = response.data;

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

                   }


    }






}