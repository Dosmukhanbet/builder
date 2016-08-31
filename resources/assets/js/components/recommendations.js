import VueResource from 'vue-resource';
import _ from 'underscore';

export default {
    template : `
    <div class="recommendations" v-show="masters">
        <div class="masters" v-for="master in masters">
            <p>
                <a data-lity href="{{ makephotopath(master.photo_path) }}">
                    <img class="img-thumbnail" v-bind:src="makethumbpath(master.thumbnail_path)"></a>
                </p>

                <p><span>Имя:</span> {{master.name}}<br>
                    <span>Мобильный номер:</span> +{{master.phone_number}}
                    <br>
                        <span v-show="master.feedbacks.length" >
                            <a class="feedbacks__link" data-toggle="modal" data-target="#masterfeedback_{{master.id}}">
                            Отзывы {{ master.feedbacks.length }}
                            </a>
                        </span><br v-show="master.feedbacks.length">
                </p>
                <p>
                    <button  @click="sendsms(master.id, master.phone_number)" class="send__sms">
                      пригласить выполнить работу
                    </button>
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
        props :['catid', 'masters', 'jobid', 'jobownerid', 'clients'],

        ready() {
            this.fetchMasters(this.catid);
            },

        data(){
            return {
            invitesend : false
            };
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

        findclient(id){
                    return _.findWhere(this.clients, {id: id}).name;
                    },
        sendsms(masterid,phonenumber){
                    let datas = {
                                    id: masterid,
                                    number : phonenumber,
                                    jobid : this.jobid,
                                    jobownerid : this.jobownerid
                                };



            var master = _.findWhere(this.masters, {id: masterid});



                this.$http.post('/api/invitesendsms', datas).then(function(response){
                console.log(response.data );
                });
                this.$http.post('/api/invitemaster', datas).then(function(response){
                console.log(response.data );
                });


            swal("Ок!", "Приглашение мастеру отправлено!", "success");



            this.invitesend = true;


            //master.invited = true;

            console.log(master.name);

            }


        }


        }

