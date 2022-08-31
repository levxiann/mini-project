<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary"></button>
    </div>
    <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
        <div class="user-logo">
            <div class="img" style="background-image: url({{asset('website/images/nophoto.png')}});"></div>
            <h3>{{Auth::user()->name}}</h3>
        </div>
    </div>
    <ul class="list-unstyled components mb-5">
        <li class="{{Request::is('/') ? 'active': ''}}">
            <a href="{{url('/')}}"><span class="fa fa-tachometer mr-3"></span> Dashboard</a>
        </li>
        <li class="{{Request::is('faculty*') ? 'active' : ''}}">
            <a href="{{url('/faculty')}}"><span class="fa fa-university mr-3 notif"></span> Fakultas</a>
        </li>
        <li class="{{Request::is('major*') ? 'active' : ''}}">
            <a href="{{url('/major')}}"><span class="fa fa-graduation-cap mr-3"></span> Jurusan</a>
        </li>
        <li class="{{Request::is('lesson*') ? 'active' : ''}}">
            <a href="{{url('/lesson')}}"><span class="fa fa-book mr-3"></span> Mata Kuliah</a>
        </li>
        <li class="{{Request::is('student*') ? 'active' : ''}}">
            <a href="{{url('/student')}}"><span class="fa fa-user-md mr-3"></span> Mahasiswa</a>
        </li>
        <li class="{{Request::is('stuless*') ? 'active' : ''}}">
            <a href="{{url('/stuless')}}"><span class="fa fa-pencil-square-o mr-3"></span> Pengambilan Matkul</a>
        </li>
        @can('superadmin')
        <li class="{{Request::is('user*') ? 'active' : ''}}">
            <a href="{{url('/user')}}"><span class="fa fa-users mr-3"></span> Users</a>
        </li>
        @endcan
        <li class="{{Request::is('profile*') ? 'active' : ''}}">
            <a href="{{url('/profile')}}"><span class="fa fa-user mr-3"></span> Profile</a>
        </li>
        <li>
            <a href="{{url('/logout')}}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
        </li>
    </ul>
</nav>