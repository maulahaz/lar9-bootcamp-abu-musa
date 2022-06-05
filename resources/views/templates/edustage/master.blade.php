<!DOCTYPE html>
<html lang="en">
  <head>
    @include('templates/edustage/meta')
    @include('templates/edustage/head')
  </head>

  <body>
    <header class="header_area">
      <div class="main_menu">

      @include('templates/edustage/header')
      @include('templates/edustage/navigation')

      </div>
    </header>

    @include('templates/edustage/content')
    
    @include('templates/edustage/footer')
    @include('templates/edustage/foot')

  </body>
</html>