
    <x-main>
        <h4 class="text-center text-danger my-3"><u> Registrati</u></h4>
        <div class="container py-4">
            <form action="/register" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label">Nome</label>
                <input class="form-control  @error ('name') is-invalid @enderror"  type="text" placeholder="Nome" name="name"/>
              </div>
             <!--  -->
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control @error ('email') is-invalid @enderror" type="email" placeholder="Email" name="email" />
              </div>
              <!--  -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control @error ('password') is-invalid @enderror" type="password" id="password" name="password" />
              </div>
 
                <!--  -->
                <div class="mb-3">
                <label for="password_confirmation" class="form-label">Conferma Password</label>
                <input class="form-control @error ('password') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation" />
                </div>
          
              <!--  -->
              <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Invia</button>
              </div>
          
            </form>
          
        </div>
    
    </x-main>
