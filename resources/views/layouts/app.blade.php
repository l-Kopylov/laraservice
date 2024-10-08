<!DOCTYPE html>
   <html lang="ru">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>@yield('title')</title>
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <a class="navbar-brand" href="{{ url('/') }}">Калькулятор потолков</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                   aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                   <li class="nav-item">
                       <a class="nav-link" href="{{ url('/gallery') }}">Галерея</a>
                   </li>
                   <li class="nav-item active">
                       <a class="nav-link" href="{{ url('/calculator') }}">Калькуляция</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ url('/contact') }}">Обратная связь</a>
                   </li>
               </ul>
           </div>
       </nav>
       <div class="container mt-5">
           @yield('content')
       </div>
       <footer class="bg-light text-center text-lg-start mt-5">
           <div class="text-center p-3">
               &copy; 2024 Калькулятор потолков
           </div>
       </footer>
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </body>
   </html>
   