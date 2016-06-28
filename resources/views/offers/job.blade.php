 <div class="Offer__block">
      <h4 class="Job__header">{{ $job->name }}</h4>
       <ul class="Job__list">
           <li>Категория :{{ $categories[$job->category_id]}}</li>
           <li>Описание : {{ $job->description }}</li>
           <li>Город: {{ $cities[$job->city_id]}}</li>
           <li>Дата/время исполнения : {{ $job->dateOfMake->diffForHumans() }}</li>
           <li>Опубликовано : {{ $job->created_at->diffForHumans() }}</li>
           <li>Бюджет : {{ $job->price }}</li>
       </ul>

 </div>




