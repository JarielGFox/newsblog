<x-main>
    <div class="container">
        <div class="row">
            <div class="col-5 mx-auto">
                <h1 class="mt-4">Accedi</h1>


                <form class="row g-3" action="{{'/login'}}" method="POST">
                    @csrf
                    <div class="col-12 mt-2">
                      <label class="mt-3" for="email">Mail</label>
                      <input type="email" class="form-control @error('email')) is-invalid @enderror"  id="email" name="email" value="{{ old('email') }}">
                      @error('email')<span class="text-danger small">{{ $message }}</span>@enderror

                    </div>
                    <div class="col-12">
                      <label for="password">Password</label>
                      <input type="password" class="form-control @error('password')) is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                      @error('password')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-12 mt-4">
                      <button type="submit" class="btn btn-primary mb-3">Login</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</x-main>
