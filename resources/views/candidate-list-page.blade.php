<x-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    @foreach ($candidates as $candidate)
    <div class="bg-gray-50 border border-gray-200 rounded p-6">
       
        
        <div class="flex" style="text-align: center;">
            <div style="text-align: center;" >
                <h3 class="text-2xl" style="text-align: center">
                    <a href="/candidate/{{$candidate->id}}"> {{$candidate->username}}</a>
                </h3>
                <div class="text-xl font-bold mb-4" style="text-align: center">"{{$candidate->slogan}}"</div>
                <ul class="flex" style="text-align: center; justify-content:center; align-items:center; justify-content:center; align-items:center;">
                    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs" style="width:8.5%;  border-radius:15px;">
                        {{$candidate->faction}}
                    </li>
                </ul>
                <div class="text-lg mt-1">
                    <i class="fa-solid fa-location-dot"></i>{{$candidate->description}}
                  
                </div>
                
            </div>
        </div>
    </div>
    @endforeach
</x-layout>