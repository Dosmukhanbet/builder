import VueResource from 'vue-resource';

export default {
    template : `
    <div class="recommendations" v-show="masters">
        <div class="masters" v-for="master in masters">
            <p>
                <a data-lity href="{{ makephotopath(master.photo_path) }}">
                    <img class="img-thumbnail" src="{{ makethumbpath(master.thumbnail_path) }}"></a>
                </p>

                <p><span>Имя:</span> {{master.name}}<br>
                    <span>Мобильный номер:</span> +{{master.phone_number}}
                </p>
                   <p> <button  @click="sendsms(master.id, master.phone_number)" class="send__sms">
                    предложить работу
                    </button>
                   </p>
        </div>

    </div>
     `,
        props :['catid', 'masters', 'jobid', 'jobownerid'],

        ready() {
            this.fetchMasters(this.catid);
            },

        data(){
            return {
            invitesend : false,
            sentTo : ''
            }
            },

        methods:{
        fetchMasters(id) {
                return this.$http.post('/api/recommendations/'+id).then(function(response){
                    console.log(response.data);
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

                    },
            sendsms(masterid,phonenumber){
            let datas = {
            id: masterid,
            number : phonenumber,
            jobid : this.jobid,
            jobownerid : this.jobownerid
            };


            this.$http.post('/api/invitesendsms', datas).then(function(response){
                console.log(response.data );
            });

            swal("Ок!", "Предложение мастеру отправлено", "success");

            this.invitesend = true;

            this.sentTo = masterid;

            console.log(this.sentTo);

            }


        }


        }

