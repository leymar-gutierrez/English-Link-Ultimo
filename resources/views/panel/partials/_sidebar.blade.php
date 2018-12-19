<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link mt-3">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="/storage/users/{{ Auth::user()->image_id ? Auth::user()->image_id : 'default.png' }} " alt="profile image">
                </div>
                <div class="text-wrapper">
                 <p class="profile-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                 <div>
                   <small class="designation text-muted">
                        @foreach (Auth::user()->roles as $value)
                              {{$value->name}}
                        @endforeach
                        </small>
                   <span class="status-indicator online"></span>
                 </div>
               </div>
              </div>
              <button class="btn btn-success btn-block">Nuevo Usuario
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Admin</span>
            </a>
            <div class="collapse" id="admin">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="/admin/courses">Cursos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/students">Estudiantes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/teachers">Tachers</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Teacher</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="/teacher/add">Empezar Curso</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/teacher/students">Alumnos por Curso</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/students/panel">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Student
              </span>
            </a>
          </li>
        </ul>
      </nav>
