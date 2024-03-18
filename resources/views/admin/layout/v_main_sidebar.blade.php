<aside class="main-sidebar elevation-4 sidebar-light-lightblue">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-lightblue">
        <img src="{{ asset('asset_login') }}/images/l.png" alt="" class="brand-image" style="opacity: 1">
        <span class="brand-text text-light font-weight-bolt ">DINSOS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 496 512">
                    <path
                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z" />
                </svg>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="true">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <p>Data Master</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('tahun') }}" class="nav-link">
                                <p>Data Tahun</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('master_data') }}" class="nav-link">
                                <p>Data Kelana dan Dekala</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <p>
                            Pengumpulan Data
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('verifikasi') }}" class="nav-link">
                                <svg height="1em" viewBox="0 0 512 512" class="nav-icon">

                                    <path
                                        d="M256 288A144 144 0 1 0 256 0a144 144 0 1 0 0 288zm-94.7 32C72.2 320 0 392.2 0 481.3c0 17 13.8 30.7 30.7 30.7H481.3c17 0 30.7-13.8 30.7-30.7C512 392.2 439.8 320 350.7 320H161.3z" />
                                </svg>
                                <p>Verifikasi Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('rekap_kelana') }}" class="nav-link">

                                <svg height="1em" viewBox="0 0 448 512" class="nav-icon">
                                    <style>
                                        svg {
                                            fill: #076870
                                        }
                                    </style>
                                    <path
                                        d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z" />
                                </svg>
                                <p>Data Kelana</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('rekap_dekela') }}" class="nav-link">
                                <svg height="1em" viewBox="0 0 640 512" class="nav-icon">>
                                    <path
                                        d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                </svg>
                                <p>Data Dekela</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <p>Data User</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('user-admin') }}" class="nav-link">
                                <p>User Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('user-kelana') }}" class="nav-link">
                                <p>User Operator Kelana</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('user-dekela') }}" class="nav-link">
                                <p>User Operator Dekela</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/logout') }}" class="nav-link">
                                <p>Logout</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
