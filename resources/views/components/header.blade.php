<div class="header">
  <nav class="nav" id="nav">
    <ul>
      <li><a href="/">Home</a></li>
      @if(isset($user))
      <form action="/logout" method="post" name="logout" id="logout">
        @csrf
        <li><a href="javascript:logout.submit()">Logout</a></li>
      </form>
      <li><a href="/mypage">Mypage</a></li>
      @else
      <li><a href="/login">Login</a></li>
      <li><a href="/register">Registration</a></li>
      @endif
    </ul>
  </nav>
  <div class="menu" id="menu">
    <span class="menu__line--top"></span>
    <span class="menu__line--middle"></span>
    <span class="menu__line--bottom"></span>
  </div>
</div>
  <script>
    const target = document.getElementById("menu");
    target.addEventListener('click', () => {
    target.classList.toggle('open');
    const nav = document.getElementById("nav");
    nav.classList.toggle('in');
    });
  </script>


