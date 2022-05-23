<div class="form-login">
    <div class="d-flex flex-row">
        <div class="banner flex-grow-1 bg-warning vh-100"></div>
        <div class="form-login px-5 mb-5 w-25 text-center d-flex flex-column align-self-end">
            <img src="assets/logo.png" alt="">

            <!-- Login Form -->
            <div class="text-start animate__animated animate__zoomIn">
                <h3>Register.</h3>
                <p>Silahkan Register terlebih dahulu <br>untuk melanjutkan.</p>

                <form class="" method="post" action="/register">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 color="#4A8FE7"
                                 class="bi bi-envelope" viewBox="0 0 16 16">
                                 <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                            </svg>
                        </span>
                        <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                               id="email" name="email" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 color="#4A8FE7" class="bi bi-person" viewBox="0 0 16 16">
                                 <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                               id="username" name="username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 color="#4A8FE7"
                                 class="bi bi-key" viewBox="0 0 16 16">
                                <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </span>
                        <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                               id="password" name="password" aria-describedby="basic-addon1">
                    </div>

                    <p class="text-danger p-0 <?= (isset($model['error'])) ? 'd-bloc' : 'd-none' ?>"><?= $model['error'] ?></p>

                    <button type="submit" class="btn mb-5 btn-login text-white">Register</button>
                    <a type="button" class="btn mb-5" href="/">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>