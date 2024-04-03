<x-layout>
    <form action="/register-candidate" method="POST" id="registration-form">
        @csrf

        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
        

        <div class="form-group" style="text-align:center">
            <label for="username-register" class="text-muted mb-1"><small style="text-align:center">Faction</small></label>
            <div style="text-align: center">
                <input type="radio" id="password-register" name="faction" value="Democrate">
                <label id="password-register" for="democrate">Democrate</label><br>
                <input type="radio" id="password-register" name="faction" value="Nationalism">
                <label id="password-register" for="nationalism">Nationalism</label><br>
                <input type="radio" id="password-register" name="faction" value="Comonism">
                <label id="password-register" for="comonism">Comonism</label><br>
                <input type="radio" id="password-register" name="faction" value="Generalism">
                <label id="password-register" for="generalism">Generalism</label><br><br>
            </div>
            
            @error('faction')
            <p class="m0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
        </div>
        
        
        <div class="form-group">
          <label for="password-register" class="text-muted mb-1"><small>Slogan</small></label>
          <input value="{{old('slogan')}}" name="slogan" id="password-register" class="form-control" type="text" placeholder="Slogan" />
          @error('slogan')
            <p class="m0 small alert alert-danger shadow-sm">{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="password-register-confirm" class="text-muted mb-1"><small>Description And Aim</small></label>
          <input value="{{old('description')}}" name="description" id="password-register-confirm" class="form-control" type="text" placeholder="Description And Aims" />
          @error('description')
            <p class="m0 small alert alert-danger shadow-sm">{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="password-register-confirm" class="text-muted mb-1"><small>National ID</small></label>
          <input  name="nationalId" id="password-register-confirm" class="form-control" type="number" placeholder="National ID" />
          @error('nationalId')
            <p class="m0 small alert alert-danger shadow-sm">{{$message}}</p>
          @enderror
        </div>


        <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Send Info</button>
      </form>
</x-layout>