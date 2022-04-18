<?php include_once "partials/header.php"?>
    <body class="bg-secondary">
        <div id="layoutAuthentication" >
            <div id="layoutAuthentication_content" >
                <main>
                    <div class="container">
                        <?php include_once "../admin/includes/message.php";?>
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body bg-">
                                        <form action="../engine/login.inc.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input name="username" class="form-control" type="text" placeholder="Enter username" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                               
                                                <button type="submit" class="btn btn-primary">Login</button>
                                                <a href="register.php" class="btn btn-secondary">Create account</a>
                                                <a href="../index.php" class="btn btn-success">Home</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
<?php include_once "../admin/includes/footer.php"?>