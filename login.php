<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mortezaom/google-sans-cdn@master/fonts.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Google Sans", sans-serif;
    }

    .container {
      display: flex;
      height: 100vh;
    }

    .sidebar {
      width: 70%;
      background-image: url('assets/images/login-bg.jpg');
      background-size: cover;
      background-position: center;
      filter: brightness(0.5);
    }

    .login-container {
      width: 30%;
      padding: 20px;
      background-color: #d0e8de;
    }

    .login-form {
        width: 80%;
        margin-left: 10%;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group button {
      width: 100%;
      padding: 10px;
      background-color: #4d9f7b;
      border: none;
      border-radius: 4px;
      color: #000;
      cursor: pointer;

    }

    .form-group button:hover {
      background-color: #45a049;
    }

    .form-redirect {
        padding-top: 8px;
    }
    .color-title {
        color: #31664f;
    }
    input[type="text"],
  input[type="password"] {
    box-sizing: border-box;
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar"></div>
    <div class="login-container">
        <h1 style="text-align: center;" class='color-title'>Login Saung Sembako</h1>
      <form class="login-form">
        <div class="form-group">
          <label for="username" class='color-title'>Email:</label>
          <input type="text" id="username" placeholder="emailanda@mail.com">
        </div>
        <div class="form-group">
          <label for="password" class='color-title'>Password:</label>
          <input type="password" id="password" placeholder="**********">
        </div>
        <div class="form-group" style='display: flex; justify-content: center;'>
          <button type="submit">Login</button>
        </div>
        <span class="form-redirect">Belum punya akun? daftar <a href="/register.php">disini</a></span>
      </form>
    </div>
  </div>
</body>
</html>
