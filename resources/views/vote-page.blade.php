<x-layout>
 

     <a href="/candidate-list-page" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src="images/acme.png"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$candidate->username}}</h3>
                <div class="text-xl font-bold mb-4">"{{$candidate->slogan}}"</div>
                <ul class="flex">
                    <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                        {{$candidate->faction}}
                    </li>
                    
                </ul>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> Daytona, FL
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                         Description
                    </h3>
                    <div class="text-lg space-y-6" >
                        {{$candidate->description}}
                        @if (auth()->user()->isVoted == 1)
                        <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs disabled" style="margin-top: 10px;">You are voted!</li>
                        <a href="/percentage-page">see the result</a>
                        @else
                        <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs" style="margin-top: 10px;">
                        <a href="/voted-page/{{auth()->user()->id}}/{{$candidate->id}}">vote</a>
                        
                        @endif
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>