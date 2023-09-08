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
                <h2 class="profile-page-heading">My Reviews</h2>
                <p class="profile-page-head-txt">This section contains your rating & review information</p>
                <div class="card box-shadow-sm" style="padding:24px;margin:12px 0;">
                   <div class="row justify-content-between">
                       <div class="col-md-2">
                           <img class="d-block img-fluid" src="{{asset('assets/front-end/img/product-image.png')}}" style="width: 300px; margin: 0 auto;" alt="QR">
                       </div>
                       <div class="col-md-10 pl-md-2">
                            <div class="review-content">
                                <label class="purchase-date">Purchased on 11 Nov 2022</label>
                                <h3 class="review-product-heading">Meridia 75" 4K UHD Smart TV</h3>
                                <div class="review-product-details" style="margin-bottom: 12px;">
                                    <span style="border-right: 1px solid #D9D9D9;padding-left: 0!important;"><span class="review-product-details-label">Sold By:</span><span class="review-product-details-value"><a href="#" style="color:#77b847; font-weight:400;font-size: 13px;text-decoration:underline;">CG|Electronics</a></span></span>
                                    <span style="border-right: 1px solid #D9D9D9;"><span class="review-product-details-label">Model: </span><span class="review-product-details-value">CGMR75E1.V2</span></span>
                                    <span ><span class="review-product-details-label">Brand: </span><span class="review-product-details-value">CG</span></span>
                                </div>
                                <div class="review-ratings mb-2">
                                    <span class="rating-star">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span class="rating-type ml-2">Delightful</span>
                                </div>
                                <div style="background-color: #A0B6D133;padding: 24px;">
                                    <p class="review-msg">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, GRFBFBB  ac aliquet odio mattis. Class aptent taciti sociosqu ad FHRF GNT litorarquent per conubia nostra, per inceptos DVB DVhimenaeos.
                                    </p>
                                    <span style="color:#656565;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>0</span></span>
                                </div>
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
