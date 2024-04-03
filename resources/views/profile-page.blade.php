<x-layout>
    <div class="container py-md-5 container--narrow">
      <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i>Back </a>
        <h2>
          <img class="avatar-small"/> {{$user->fullName}}
          <form class="ml-2 d-inline" action="/change-settings/{{$user->id}}/form" method="get">
            <button class="btn btn-primary btn-sm">Change Settings <i class="fas fa-user-plus"></i></button>
            <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
          </form>
        </h2>
  
      
  

      </div>
</x-layout>