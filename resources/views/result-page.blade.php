<x-layout>
    <a href="/candidate-list-page" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i>Back to the candidate list</a>

   
    <div class="container mt-3">
        @foreach ($candidates as $candidate)
        <div class="progress" style="margin-bottom: 5%">
            <div class="text" style="">{{$candidate}}</div>
        </div>
        @if ($id < $lenghtOfCandidatesId)
        <div class="progress">
            <div class="progress-bar" style="width:{{$percantages[$id]}}%">{{$percantages[$id]}}%</div>
        </div>
        @php
            $id++;
        @endphp
        @endif
       
        @endforeach





          








    </div>

</x-layout>