<div class="sidebar" data-color="dark">

<center><div class="logo">
   <a href="" class="simple-tex">
    <img src="{{ asset('assets/img/LogoA.png') }}" alt="">
    </a>
    <a href="" class="simple-text logo-normal">
      {{ __('Arenera El Éxito') }}
    </a>
  </div></center>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Home') }}</p>
        </a>
      </li>

      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="now-ui-icons users_single-02"></i>
          <p>
            {{ __("USUARIOS") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons business_badge"></i>
                <p> {{ __("PERFIL DE USUARIOS") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons loader_gear"></i>
                <p> {{ __("GESTION DE USUARIOS") }} </p>
              </a>
            </li>
          </ul>
        </div>
       

        <li>
        <a data-toggle="collapse" href="#laravelSales">
            <i class="now-ui-icons shopping_shop"></i>
          <p>
            {{ __("VENTAS") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelSales">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("LISTAR VENTAS") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons ui-1_simple-add"></i>
                <p> {{ __("REGISTRAR VENTA") }} </p>
              </a>
            </li>
          </ul>
        </div>
       

      <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons files_paper"></i>
          <p>{{ __('Clientes') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons shopping_box"></i>
          <p>{{ __('Productos') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class = "">
        <a href="{{ route('page.index','upgrade') }}" class="bg-info">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
