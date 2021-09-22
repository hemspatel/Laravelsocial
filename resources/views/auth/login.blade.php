<x-guest-layout>
    <x-auth-card>
      <!-- Outer Row -->
      <div class="row justify-content-center">

          <div class="col-xl-10 col-lg-12 col-md-9">

              <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                      <!-- Nested Row within Card Body -->
                      <div class="row">
                          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                          <div class="col-lg-6">
                              <div class="p-5">
                                  <div class="text-center">
                                      <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                      <!-- Session Status -->
                                      <x-auth-session-status class="mb-4" :status="session('status')" />

                                      <!-- Validation Errors -->
                                      <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                  </div>
                                  <form method="POST" action="{{ route('login') }}" class="user">
                                      @csrf
                                      <div class="form-group">
                                        <x-label for="email" :value="__('Email')" />
                                        <x-input placeholder="Enter Email Address..." id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" required autofocus />
                                      </div>
                                      <div class="form-group">
                                        <x-label for="password" :value="__('Password')" />
                                        <x-input id="password" class="form-control form-control-user"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password"  placeholder="Password"/>
                                      </div>
                                      <div class="form-group">
                                          <div class="custom-control custom-checkbox small">
                                            <input id="remember_me" type="checkbox" class="custom-control-input" name="remember">
                                              <label class="custom-control-label" for="customCheck">{{ __('Remember me') }}</label>
                                          </div>
                                      </div>
                                      <x-button class="btn btn-primary btn-user btn-block">
                                          {{ __('Log in') }}
                                      </x-button>
                                      <hr>
                                      <a href="{{ route('googleauth')}}" class="btn btn-google btn-user btn-block">
                                          <i class="fab fa-google fa-fw"></i> Login with Google
                                      </a>
                                  </form>
                                  <hr>
                                  <div class="text-center">
                                      @if (Route::has('password.request'))
                                          <a class="small" href="{{ route('password.request') }}">
                                              {{ __('Forgot your password?') }}
                                          </a>
                                      @endif
                                  </div>
                                  <div class="text-center">
                                      <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

          </div>

      </div>
        <!-- <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot> -->
    </x-auth-card>
</x-guest-layout>
