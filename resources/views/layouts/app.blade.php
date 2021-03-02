<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraTail-Post what u like..</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-gray-800 flex justify-between mb-6">
      <ul class="flex items-center">
          <li>
            <a href="/" class="p-3 text-white">Home</a>
          </li>
          <li>
            <a href="{{ route('dashboard') }}" class="p-3 text-white">Dashboard</a>
          </li>
          <li>
              <a href="{{ url('post') }}" class="p-3 text-white">Post</a>
          </li>
      </ul>

      <ul class="flex items-center">
          @auth
          <li>
            <a href="" class="p-3 text-white">{{ auth()->user()->name }}</a>
          </li>
          <li>
              <form action="{{ route('logout') }}" method="post" class="p-3 text-white inline">
                @csrf
                  <button type="submit">Logout</button>
              </form>
          </li>
          @endauth
          @guest
          <li>
              <a href="{{ url('register') }}" class="p-3 text-white">Register</a>
          </li>
          <li>
              <a href="{{ route('login') }}" class="p-3 text-white">login</a>
          </li>
          @endguest

    </ul>
    </nav>
@yield('content')
</body>
</html>
