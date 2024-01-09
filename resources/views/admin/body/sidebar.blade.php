<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Easy<span>Learning</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">Realstate</li>


        @can('type.menu')
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property type</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">

             
              @can('all.type')
              <li class="nav-item">
                <a href="{{route('allType')}}" class="nav-link">All type</a>
              </li>
              @endcan

              
              @can('add.type')
              <li class="nav-item">
                <a href="{{route('addType')}}" class="nav-link">Add type</a>
              </li>
              @endcan

            </ul>
          </div>
        </li>
        @endcan


        @can('state.menu')
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#state" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property state</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="state">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('allType')}}" class="nav-link">All type</a>
              </li>
              <li class="nav-item">
                <a href="{{route('addType')}}" class="nav-link">Add type</a>
              </li>
            </ul>
          </div>
        </li>
        @endcan



        @can('amenities.menu')
        
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#amenitie" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Amenitie</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="amenitie">
            <ul class="nav sub-menu">

              @can('amenities.all')
              <li class="nav-item">
                <a href="{{route('allAmenitie')}}" class="nav-link">All amenitie</a>
              </li>
              @endcan

              @can('amenities.add')
              <li class="nav-item">
                <a href="{{route('addAmenities')}}" class="nav-link">Add amenitie</a>
              </li>
              @endcan

            </ul>
          </div>
        </li>
        @endcan
       


   


       

        


        <li class="nav-item nav-category">User All functions</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">UI Kit</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="uiComponents">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
              </li>
              
            </ul>
          </div>
        </li>

        <li class="nav-item nav-category">Role & Permission</li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Role & Permission</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('allPermission')}}" class="nav-link">All Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{route('allRoles')}}" class="nav-link">All Roles</a>
              </li>

              <li class="nav-item">
                <a href="{{route('role_permission')}}" class="nav-link">Roles in Permissions</a>
              </li>


              <li class="nav-item">
                <a href="{{route('allRolesInPermissions')}}" class="nav-link">All Roles in Permissions</a>
              </li>
            
            </ul>
          </div>
        </li>
        
   
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ManageUi" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Manage Admin Users</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="ManageUi">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('allAdmin')}}" class="nav-link">All Admin</a>
              </li>
              <li class="nav-item">
                <a href="{{route('allAdmin')}}" class="nav-link">Add Admin</a>
              </li>
            
            </ul>
          </div>
        </li>



        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
          <a href="#" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <nav class="settings-sidebar">
    <div class="sidebar-body">
      <a href="#" class="settings-sidebar-toggler">
        <i data-feather="settings"></i>
      </a>
      <div class="theme-wrapper">
        <h6 class="text-muted mb-2">Light Theme:</h6>
        <a class="theme-item" href="../demo1/dashboard.html">
          <img src="../assets/images/screenshots/light.jpg" alt="light theme">
        </a>
        <h6 class="text-muted mb-2">Dark Theme:</h6>
        <a class="theme-item active" href="../demo2/dashboard.html">
          <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
        </a>
      </div>
    </div>
  </nav>