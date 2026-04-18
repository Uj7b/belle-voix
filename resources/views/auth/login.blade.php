<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SchoolHub – Login</title>
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Geist', sans-serif;
    background: #f0f6fc;
    min-height: 100vh;
    display: grid;
    place-items: center;
    padding: 24px;
  }

  .wrap {
    width: 100%;
    max-width: 380px;
    animation: rise .45s cubic-bezier(.22,1,.36,1) both;
  }
  @keyframes rise {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  h1 {
    font-size: 28px;
    font-weight: 600;
    color: #0f1c28;
    letter-spacing: -.5px;
    margin-bottom: 6px;
  }
  .sub {
    font-size: 14px;
    color: #7a94a8;
    margin-bottom: 36px;
  }

  .field { margin-bottom: 12px; }
  .field label {
    display: block;
    font-size: 11.5px;
    font-weight: 500;
    letter-spacing: .4px;
    text-transform: uppercase;
    color: #9eb4c6;
    margin-bottom: 7px;
  }
  .field input {
    width: 100%;
    height: 48px;
    padding: 0 16px;
    background: #fff;
    border: 1px solid #dae8f5;
    border-radius: 12px;
    font-size: 14px;
    font-family: inherit;
    color: #0f1c28;
    outline: none;
    transition: border-color .15s, box-shadow .15s;
  }
  .field input:focus {
    border-color: #3b9fe8;
    box-shadow: 0 0 0 4px rgba(59,159,232,.10);
  }
  .field input::placeholder { color: #c2d6e8; }

  .meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 20px 0 24px;
  }
  .remember {
    display: flex; align-items: center; gap: 7px;
    font-size: 13px; color: #7a94a8; cursor: pointer;
  }
  .remember input { accent-color: #3b9fe8; width: 15px; height: 15px; }
  .forgot { font-size: 13px; font-weight: 500; color: #3b9fe8; text-decoration: none; }

  .btn {
    width: 100%;
    height: 50px;
    background: #0f1c28;
    color: #fff;
    border: none;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 500;
    font-family: inherit;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background .15s, transform .1s;
  }
  .btn:hover { background: #1d3347; }
  .btn:active { transform: scale(.99); }
</style>
</head>
<body>
<div class="wrap">
  <h1>Welcome back</h1>
  @if ($errors->any())
    <div style="color: red;">
        {{ $errors->first() }}
    </div>
@endif
  <p class="sub">Sign in to SchoolHub</p>
  <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="field">
    <label>Email</label>
    <input type="email" name="email" placeholder="your-email@belle-voix.in" autofocus>
  </div>

  <div class="field">
    <label>Password</label>
    <input type="password" name="password" placeholder="••••••••">
  </div>

  <div class="meta">
    <label class="remember">
      <input type="checkbox"> Remember me
    </label>
    <a href="#" class="forgot">Forgot password?</a>
  </div>

  <button class="btn">
    Sign in
    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
  </button>
</form>
</div>
</body>
</html>