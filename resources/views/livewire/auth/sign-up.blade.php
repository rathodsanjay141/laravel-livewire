  <section class="h-100-vh mb-8">
      <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"
          style="background-image: url('../assets/img/curved-images/curved14.jpg');">
          <span class="mask bg-gradient-dark opacity-6"></span>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-5 text-center mx-auto">
                      <h1 class="text-white mb-2 mt-5">{{ ('Welcome!') }}</h1>
                      
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row mt-lg-n10 mt-md-n11 mt-n10">
              <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                  <div class="card z-index-0">
                      <div class="card-header text-center pt-4">
                          <h5>{{ ('Register with') }}</h5>
                      </div>
                      
                      <div class="card-body">

                          <form wire:submit="register" action="#" method="POST" role="form text-left">
                              <div class="mb-3">
                                  <div class="@error('name') border border-danger rounded-2  @enderror">
                                      <input wire:model.live="name" type="text" class="form-control" placeholder="Name"
                                          aria-label="Name" aria-describedby="email-addon">
                                  </div>
                                  @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                              <div class="mb-3">
                                  <div class="@error('email') border border-danger rounded-2 @enderror">
                                      <input wire:model.live="email" type="email" class="form-control" placeholder="Email"
                                          aria-label="Email" aria-describedby="email-addon">
                                  </div>
                                  @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                              <div class="mb-3">
                                  <div class="@error('password') border border-danger rounded-2 @enderror">
                                      <input wire:model.live="password" type="password" class="form-control"
                                          placeholder="Password" aria-label="Password"
                                          aria-describedby="password-addon">
                                  </div>
                                  @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                              <div class="form-check form-check-info text-left">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                      checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                      {{ ('I agree the') }} <a href="javascript:;"
                                          class="text-dark font-weight-bolder">{{ ('Terms and Conditions') }}</a>
                                  </label>
                              </div>
                              <div class="text-center">
                                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                              </div>
                              <p class="text-sm mt-3 mb-0">{{ ('Already have an account? ') }}<a
                                       wire:navigate href="{{ route('login') }}"
                                      class="text-dark font-weight-bolder">{{ ('Sign in') }}</a>
                              </p>
                          </form>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
