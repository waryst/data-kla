<aside class="main-sidebar elevation-4 sidebar-light-lightblue">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-lightblue">
        <img src="{{ asset('asset_login') }}/images/l.png" alt="" class="brand-image" style="opacity: 1">
        <span class="brand-text text-light font-weight-bolt ">Ponorogo Hebat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <svg class="svg" class="nav-icon" height="1.6em" viewBox="0 0 576 512">
                            <style>
                                .svg {
                                    fill: #F5F9F9
                                }
                            </style>
                            <path
                                d="M512 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H512zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM208 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H304c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H176zM376 144c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z" />
                        </svg>
                        <p>
                            Entry Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if (auth()->user()->role == 'kecamatan')
                                <a href="{{ url('dekela') }}" class="nav-link">
                                    <p>KELANA</p>
                                </a>
                            @elseif (auth()->user()->role == 'desa')
                                <a href="{{ url('kelana') }}" class="nav-link">

                                    <p>DEKELA</p>
                                </a>
                            @endif


                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">

                        <svg class="svg" height="1em" viewBox="0 0 512 512">
                            <style>
                                .svg {
                                    fill: #F5F9F9
                                }
                            </style>
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" data-toggle="modal" data-target="#modal-pass" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z" />
                                </svg>
                                <p>Edit Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/logout') }}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z" />
                                </svg>
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

<div class="modal fade" id="modal-pass" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="mb-0">GANTI PASSWORD</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group floating">

                    <label for="password">Password Baru</label>
                    <div class="input-group">
                        <input type="password" class="form-control floating" id="password" name="password"
                            autocomplete="off">
                        <span class="input-group-append align-middle">
                            <button tabindex="-1" class="btn btn-default eye" data-input="password">
                                <i class="mdi mdi-eye-outline"></i>
                            </button>
                        </span>
                    </div>
                    <div class="text-danger" id="passwordError"></div>
                </div>

                <label for="password_confirmation">Ulangi Password</label>
                <div class="form-group floating">
                    <div class="input-group">
                        <input type="password" class="form-control floating" id="password_confirmation"
                            name="password_confirmation" autocomplete="off">
                        <span class="input-group-append">
                            <button tabindex="-1" class="btn btn-default eye" data-input="password_confirmation">
                                <i class="mdi mdi-eye-outline"></i>
                            </button>
                        </span>
                    </div>

                </div>
                <div class="text-danger" id="password_confirmationError"></div>
                <button class="btn btn-info float-right simpan-password">SIMPAN</button>
            </div>
        </div>
    </div>
</div>
@push('java')
    <script type="text/javascript">
        $(".eye").on("click", function(e) {
            e.preventDefault();

            let input = $(this).data('input');

            if ($("#" + input).attr("type") == "password") {
                $("#" + input).attr("type", "text");
                $(this).html('<i class="mdi mdi-eye-off-outline"></i>');
            } else if ($("#" + input).attr("type") == "text") {
                $("#" + input).attr("type", "password");
                $(this).html('<i class="mdi mdi-eye-outline"></i>');
            }
        });
        $('.simpan-password').on('click keyup', function(e) {
            password = $('#password').val();
            password_confirmation = $('#password_confirmation').val();
            hp = $('#hp').val();
            var fd = new FormData();
            fd.append('password', password);
            fd.append('password_confirmation', password_confirmation);
            fd.append('hp', hp);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('ganti_password') }}",
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',

                success: function(data) {
                    window.location = data.url;
                },
                error: function(data) {
                    $('#password').removeClass('is-invalid');
                    $('#passwordError').addClass('d-none');
                    var errors = data.responseJSON;
                    if ($.isEmptyObject(errors) == false) {
                        $.each(errors.errors, function(key, value) {
                            var ErrorID = '#' + key + 'Error';
                            var InputID = '#' + key;
                            $(InputID).addClass("is-invalid");
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        })
                    }
                }
            });
        });
    </script>
@endpush
