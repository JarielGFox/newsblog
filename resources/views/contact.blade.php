<x-main>


    <div class="container py-4">
        <form action="{{route('send')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nome</label>
            <input class="form-control" type="text" placeholder="Nome" name="nome"/>
          </div>
      
          <!--  -->
          <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input class="form-control" type="number" placeholder="" name="telefono" />
          </div>
        <!--  -->
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" type="email" placeholder="Email" name="mail" />
          </div>
          <!-- -->
          <div class="mb-3">
            <label class="form-label" >Messaggio</label>
            <textarea class="form-control" type="text" placeholder="Messaggio" style="height: 10rem;" name="messaggio"></textarea>
          </div>
      
          <!--  -->
          <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Invia</button>
          </div>
      
        </form>
      
    </div>

</x-main>