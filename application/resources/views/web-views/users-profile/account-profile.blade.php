@extends('layouts.front-end.app')

@section('title',auth('customer')->user()->f_name.' '.auth('customer')->user()->l_name)


@section('content')

    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </nav>
    </div>
    <!-- Page Title-->
    <div class="container d-none rtl">
        <h3 class="py-3 m-0 text-center headerTitle">{{\App\CPU\translate('profile_Info')}}</h3>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 rtl">
        <div class="row">
            <!-- Sidebar-->
            @include('web-views.partials._profile-aside')
            <!-- Content  -->
            <section class="col-lg-9 col-md-9 __customer-profile">
                <div class="card box-shadow-sm mb-3">
                    <div class="card-header">
                        <!--user account header start-->
                        <div class="user-profile-head">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img class="mr-3" src="{{asset('assets/front-end/img/user-profile/user-img.png')}}"
                                         alt="">
                                    <h3 class="font-nameA">{{\App\CPU\translate('account_information')}} </h3>
                                </div>
                                <div class="profile-edit">
                                    <a class="profile-edit-btn" href="{{route('user-account-edit')}}">Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--user account header start-->
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <!--user profile uneditable start-->
                                <div class="user-profile-uneditable">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">First Name</p>
                                                <p class="label-data">{{$customerDetail['f_name']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Middle Name</p>
                                                <p class="label-data"></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Last Name</p>
                                                <p class="label-data">{{$customerDetail['l_name']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Email Address</p>
                                                <p class="label-data">{{$customerDetail['email']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Mobile Number</p>
                                                <p class="label-data">{{$customerDetail['phone']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Gender</p>
                                                <p class="label-data">Female</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Date of Birth</p>
                                                <p class="label-data">06 Apr 2006</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--user profile uneditable end-->
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card box-shadow-sm">
                    <div class="card-header">
                        <!--user account header start-->
                        <div class="user-profile-head">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img class="mr-3" style="width: 20px" src="{{asset('assets/front-end/img/kyc.png')}}"
                                         alt="">
                                    <h3 class="font-nameA">{{\App\CPU\translate('KYC_information')}} </h3>
                                </div>
                                <div class="profile-edit">
                                    <a class="profile-edit-btn" href="{{route('user-account-edit')}}">Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--user account header start-->
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <!--user profile uneditable start-->
                                <div class="user-profile-uneditable">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">First Name</p>
                                                <p class="label-data">{{$customerDetail['f_name']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Middle Name</p>
                                                <p class="label-data"></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Last Name</p>
                                                <p class="label-data">{{$customerDetail['l_name']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Email Address</p>
                                                <p class="label-data">{{$customerDetail['email']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Mobile Number</p>
                                                <p class="label-data">{{$customerDetail['phone']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Gender</p>
                                                <p class="label-data">Female</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sec">
                                                <p class="account-label">Date of Birth</p>
                                                <p class="label-data">06 Apr 2006</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--user profile uneditable end-->
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/front-end')}}/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="{{asset('assets/back-end/js/croppie.js')}}"></script>
    <script>
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#confirm_password").val();
            $("#message").removeAttr("style");
            $("#message").html("");
            if (confirmPassword == "") {
                $("#message").attr("style", "color:black");
                $("#message").html("{{\App\CPU\translate('Please ReType Password')}}");

            } else if (password == "") {
                $("#message").removeAttr("style");
                $("#message").html("");

            } else if (password != confirmPassword) {
                $("#message").html("{{\App\CPU\translate('Passwords do not match')}}!");
                $("#message").attr("style", "color:red");
            } else if (confirmPassword.length <= 6) {
                $("#message").html("{{\App\CPU\translate('password Must Be 6 Character')}}");
                $("#message").attr("style", "color:red");
            } else {

                $("#message").html("{{\App\CPU\translate('Passwords match')}}.");
                $("#message").attr("style", "color:green");
            }

        }

        $(document).ready(function () {
            $("#confirm_password").keyup(checkPasswordMatch);

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#files").change(function () {
            readURL(this);
        });

    </script>
    <script>
        function form_alert(id, message) {
            Swal.fire({
                title: '{{\App\CPU\translate('Are you sure')}}?',
                text: message,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $('#' + id).submit()
                }
            })
        }
    </script>
@endpush
