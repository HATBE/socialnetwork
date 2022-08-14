<?php
    require_once(__DIR__ . '/../src/init.php');

    use app\Template;
?>

<?= Template::load('header', ['title' => 'Login', 'noparts' => true]);?>

<main style="height: 100vh;" class="d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card bg-dark">
                    <div class="row g-0">
                        <div class="rounded-start overflow-hidden col-md-6 col-lg-5 d-none d-md-flex justify-content-center align-items-center">
                            <img draggable="false" class="img-filter-darken position-relative object-fit-cover w-100 h-100" src="assets/img/network.png" alt="">    
                            <span class="h1 user-select-none position-absolute text-shadow">Welcome</span>
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-white">
                                <form method="post">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h1 fw-bold mb-0 color-primary">
                                            Login
                                        </span>
                                    </div>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                                    <div class="mb-4" id="login-msg"></div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="input-username">Username</label>
                                        <input id="input-login-username" type="text" class="bg-dark text-light form-control form-control-lg" placeholder="...">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="input-password">Password</label>
                                        <input id="input-login-password" type="password" class="bg-dark text-light form-control form-control-lg" placeholder="...">
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <button id="btn-login-submit" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                    </div>
                                    <a class="small text-muted" href="/resetpw">Forgot password?</a>
                                    <p>Don't have an account? <a class="text-muted" href="/register">Register here</a></p>
                                </form>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= Template::load('footer', ['noparts' => true, 'scripts' => ['/assets/js/login.js']]);?>