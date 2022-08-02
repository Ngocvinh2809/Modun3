
        @include('layout.admin.inclues.header')
        <div id="layoutSidenav">
        @include('layout.admin.inclues.sidebar')
          
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    
                        @yield('content')
                    </div>
                </main>
                
            </div>
        </div>
       
            @include('layout.admin.inclues.footer')
            