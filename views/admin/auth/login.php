<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Monday - Slim Blog</title>

    <link rel="stylesheet" href="/public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/app.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-6 col-md-6 login-box">
            <h2>Login Information</h2>
            <div class="card shadow">
              <div class="card-body">
                <form action="/admin/login" method="post">
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>