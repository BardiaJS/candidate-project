<x-layout>
    <div class="container py-md-5">
        <div class="row align-items-center">
          <div class="col-lg-7 py-3 py-md-5">
            <img src="images/1600682639793.gif">
          </div>
          <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
            <form action="/register-user" method="POST" id="registration-form">
              @csrf
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

              <div class="form-group">
                <label for="password-register" class="text-muted mb-1"><small>Full Name</small></label>
                <input value="{{old('fullName')}}" name="fullName" id="password-register" class="form-control" type="text" placeholder="Full Name" />
                @error('fullName')
                  <p class="m0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>


              <div class="form-group">
                <label for="password-register" class="text-muted mb-1"><small>National ID</small></label>
                <input value="{{old('nationalId')}}" name="nationalId" id="password-register" class="form-control" type="number" placeholder="National ID" />
                @error('nationalId')
                  <p class="m0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>
  
              <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Sign up for Candi Vote</button>
            </form>
          </div>
        </div>
      </div>
  
</x-layout>