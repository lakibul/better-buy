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
                <h2 class="profile-page-heading">Saved Carts</h2>
                <p class="profile-page-head-txt mb-2">This section contains your saved carts information</p>
                    <table class="table table-responsive-md table-nowrap profile-table mt-3">
                        <thead>
                        <tr>
                            <th scope="col" class="text-nowrap">Name</th>
                            <th scope="col" class="text-nowrap">Created On</th>
                            <th scope="col" class="text-nowrap">Products</th>
                            <th scope="col" class="text-nowrap">Amount</th>
                            <th scope="col" class="text-nowrap">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-nowrap">Cart 1</td>
                            <td class="text-nowrap">07 Aug, 2022</td>
                            <td class="text-nowrap">
                                <ol style="padding-left: 15px!important;">
                                    <li>LG 55” OLED 4K TV</li>
                                    <li>Top Loading Washing Machine 7.5 KG</li>
                                    <li>Show Case 540 Ltrs</li>
                                    <a href="#" style="margin-left: -15px!important;">+4 More</a>
                                </ol>

                            </td>
                            <td class="text-nowrap">₹3,47,760</td>
                            <td class="text-nowrap">
                                <select style="border:1px solid #D9D9D9; padding:12px;outline:none;">
                                    <option>Update</option>
                                    <option>Delete</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap">Cart 1</td>
                            <td class="text-nowrap">07 Aug, 2022</td>
                            <td class="text-nowrap">
                                <ol style="padding-left: 15px!important;">
                                    <li>LG 55” OLED 4K TV</li>
                                    <li>Top Loading Washing Machine 7.5 KG</li>
                                    <li>Show Case 540 Ltrs</li>
                                    <a href="#" style="margin-left: -15px!important;">+4 More</a>
                                </ol>


                            </td>
                            <td class="text-nowrap">₹3,47,760</td>
                            <td class="text-nowrap">
                                <select style="border:1px solid #D9D9D9; padding:12px;outline:none;">
                                    <option>Update</option>
                                    <option>Delete</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>

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
