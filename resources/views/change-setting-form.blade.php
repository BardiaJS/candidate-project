<x-layout>
  <a href="/profile/{{auth()->user()->id}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i>Back</a>
    <form action="/update-inputs/{{auth()->user()->id}}" method="POST" id="registration-form">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
          <input value="{{old('username')}}" name="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
          @error('username')
            <p class="m0 small alert alert-danger shadow-sm">{{$message}}</p>
          @enderror
        </div>

        
        <div class="form-group">
          <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
          <input value="{{old('password')}}" name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
          @error('password')
            <p class="m0 small alert alert-danger shadow-sm">{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
          <input value="{{old('password_confirmation')}}" name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
          @error('password_confirmation')
            <p class="m0 small alert alert-danger shadow-sm">{{$message}}</p>
          @enderror
        </div>

        <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Save the change</button>
      </form>
</x-layout>