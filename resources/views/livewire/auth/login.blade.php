<div class="auth-fluid" style="background-image:url('{{ url('https://cdn.conectiacapital.com/auth/1.0.0/assets/images/login-bg.png') }}') ">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="p-3">
                <div class="auth-brand text-center text-lg-start">
                    <div class="auth-brand text-center">
                        <a href="{{ route('login') }}" class="logo ">
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo-investta.png') }}" width="200px">
                            </span>
                        </a>
                    </div>
                </div>
                <p class="text-muted mb-4">Ingrese su dirección de correo electrónico y contraseña para acceder a la
                    cuenta.</p>
                <form wire:submit.prevent="login">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electronico</label>
                        <input class="form-control" type="email" id="email" wire:model="email" required=""
                               placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" wire:model="password" class="form-control">
                            <div class="input-group-text" data-password="false">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                        </div>
                        <a href="" class="float-end mt-2" data-bs-toggle="modal" data-bs-target="#youForgotYourPassword" > <strong>¿Olvido su contraseña?</strong></small></a>
                    </div>
                    <br>
                    <div class="text-center d-grid">
                        <button class="btn btn-primary" type="submit">Ingresar</button>
                    </div>
                    <a href="" class="btn btn-secondary w-100 mt-3">
                        <img width="18px"
                             src="https://d264syl95s1exz.cloudfront.net/cms/assets/images/logo-microsoft.png" alt="">
                        Iniciar sesión con Microsoft
                    </a>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul style="padding: 0px 5px;margin: 0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">

        </div> <!-- end auth-user-testimonial-->
    </div>
    <div class="modal fade" id="youForgotYourPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Por favor, escribe al equipo de tecnología para restaurar tu contraseña, <br>
                    puedes contactarlos a través de <strong>Slack</strong>.
                </div>

            </div>
        </div>
    </div>


</div>
