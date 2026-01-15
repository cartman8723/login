<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow" style="width: 50rem;">
        <div class="card-body text-center">
            <h5 class="card-title">Bienvenido {{ auth()->user()->name }}</h5>
            <p class="card-text">Selecciona tu espacio</p>
           <div class="row">
               <div class="col-md-3 p-4">
                   <img class="img-fluid" src="{{ asset('assets/images/apps.png') }}" alt="">
               </div>
               <div class="col-md-3 p-4">
                   <img class="img-fluid" src="{{ asset('assets/images/apps.png') }}" alt="">
               </div>
               <div class="col-md-3 p-4">
                   <img class="img-fluid" src="{{ asset('assets/images/apps.png') }}" alt="">
               </div>
               <div class="col-md-3 p-4">
                   <img class="img-fluid" src="{{ asset('assets/images/apps.png') }}" alt="">
               </div>
           </div>
            <center>
                <img width="140" src="{{ asset('assets/images/logo-investta.png') }}" alt="">
            </center>
        </div>
    </div>
</div>
