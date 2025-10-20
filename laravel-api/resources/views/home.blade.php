<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Example</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/good-donkey.css') }}">
  <style>
    /* إظهار الـ dropdown على hover بدل JS */
    .dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0; /* يمنع أي مسافة بين الزر والقائمة */
    }
  </style>
</head>
<body class="">
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">MySite</a>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">

          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>

          <!-- Dropdown -->
          <li class="nav-item dropdown">

          @auth
          
             


            <form class="nav-link dropdown-toggle" method="POST" action="{{route('logout')}}"  > 
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
            <ul class="dropdown-menu">
              <li>
              
              <a class="dropdown-item" >{{auth()->user()->email}}</a>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>

        </ul>
        @else

        <a class="nav-link dropdown-toggle" href="#">تسجيل دخول</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('register.show')}}">register</a></li>
              <li><a class="dropdown-item" href="{{route('login.show')}}">login</a></li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>

        </ul>

          @endauth
      </div>
    </div>
  </nav>

<!-- From Uiverse.io by andrew-demchenk0 --> 
<div class="wrapper d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card-switch">
      <label class="switch">
        <input type="checkbox" class="toggle">
        <span class="slider"></span>
        <span class="card-side"></span>
        <div class="flip-card__inner">
          <div class="flip-card__front">
            <div class="title">Log in</div>
            <form class="flip-card__form" action="">
              <input class="flip-card__input" name="email" placeholder="Email" type="email">
              <input class="flip-card__input" name="password" placeholder="Password" type="password">
              <button class="flip-card__btn">Let`s go!</button>
            </form>
          </div>
          <div class="flip-card__back">
            <div class="title">Sign up</div>
            <form class="flip-card__form" action="">
              <input class="flip-card__input" placeholder="Name" type="name">
              <input class="flip-card__input" name="email" placeholder="Email" type="email">
              <input class="flip-card__input" name="password" placeholder="Password" type="password">
              <button class="flip-card__btn">Confirm!</button>
            </form>
          </div>
        </div>
      </label>
    </div>   
  </div>



</body>
</html>
