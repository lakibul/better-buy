@extends('layouts.front-end.app')

@section('title',auth('customer')->user()->f_name.' '.auth('customer')->user()->l_name)


@section('content')
    <!-- Page Title-->
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </nav>
    </div>
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
                <div class="card box-shadow-sm">
                    <div class="card-header">
                        <!--user account header start-->
                        <div class="user-profile-head">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img class="mr-3" src="{{asset('assets/front-end/img/user-profile/user-img.png')}}"
                                         alt="">
                                    <h3 class="font-nameA">{{\App\CPU\translate('account_information')}} </h3>
                                </div>
                            </div>
                        </div>
                        <!--user account header start-->
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <form class="mt-0 px-sm-2 pb-2" action="{{route('user-update')}}" method="post"
                                      enctype="multipart/form-data">
                                    <div class="row photoHeader g-3">

                                        @csrf
                                        <div class="d-flex justify-content-between mb-3 mb-md-0 align-items-center">
{{--                                            <img id="blah"--}}
{{--                                                 class="rounded-circle border __inline-48"--}}
{{--                                                 onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"--}}
{{--                                                 src="{{asset('application/storage/app/public/profile')}}/{{$customerDetail['image']}}">--}}

{{--                                            <div class="{{Session::get('direction') === "rtl" ? 'pr-2' : 'pl-2'}}">--}}
{{--                                                <h5 class="font-name">{{$customerDetail->f_name. ' '.$customerDetail->l_name}}</h5>--}}
{{--                                                <label for="files"--}}
{{--                                                       style="cursor: pointer; color:{{$web_config['primary_color']}};"--}}
{{--                                                       class="spandHeadO m-0">--}}
{{--                                                    {{\App\CPU\translate('change_your_profile')}}--}}
{{--                                                </label>--}}
{{--                                                <span class="text-danger __text-10px">( * {{\App\CPU\translate('Image ratio should be 1:1')}}  )</span>--}}
{{--                                                <input id="files" name="image" hidden type="file">--}}
{{--                                            </div>--}}

                                        </div>


                                        <div class="card-body mt-md-0 pt-0 pb-5">
                                            <div class="form-row">
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="Name">{{\App\CPU\translate('name')}}
                                                        <small class="text-primary">*</small>
                                                    </label>
                                                    <input type="text" class="form-control" id="f_name" name="f_name"
                                                           value="{{$customerDetail['f_name']}}" required>

                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label
                                                        for="mName"> {{\App\CPU\translate('middle_name')}} </label>
                                                    <input type="text" class="form-control" id="mName"
                                                           name="m_name"
                                                           value="">
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label
                                                        for="lastName"> {{\App\CPU\translate('last_name')}}
                                                        <small class="text-primary">*</small>
                                                    </label>
                                                    <input type="text" class="form-control" id="l_name"
                                                           name="l_name"
                                                           value="{{$customerDetail['l_name']}}">
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="phone">{{\App\CPU\translate('Mobile_Number')}}
                                                        <small class="text-primary">*</small>
                                                        <!--<small class="text-primary">(
                                                * {{\App\CPU\translate('country_code_is_must')}} {{\App\CPU\translate('like_for_BD_880')}}
                                                        )</small>-->
                                                    </label>
                                                    <input type="number" class="form-control" type="text" id="phone"
                                                           name="phone"
                                                           value="{{$customerDetail['phone']}}" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="inputEmail4">{{\App\CPU\translate('Email')}}<span class="mx-2 text-success">Verified</span> </label>
                                                    <input type="email" class="form-control" type="email"
                                                           id="account-email"
                                                           value="{{$customerDetail['email']}}">
                                                </div>
                                                <div class="form-group col-md-6 mb-0 d-flex align-items-end">
                                                    <a href="#" class="btn profile-form-btn" data-toggle="modal" data-target="#email-otp">{{\App\CPU\translate('verify')}}</a>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="email-otp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 412px;">
                                                        <div class="modal-content custom-reg-modal">
                                                            <div class="modal-header custom-modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <h5 class="modal-title registration-header mx-auto" id="exampleModalLabel">Almost There</h5>
                                                            <div class="modal-body otp-modal-body">
                                                                <form method="post" id="otp-check-form">
                                                                    <p class="text-center otp-msg mt-2">Please enter the 6 digit OTP that we just sent on <span class="otp-mobile ml-1">+977 1234567890</span></p>
                                                                    <div class="otp-placeholder text-center">
                                                                        <input type="text" maxlength="1" name="otp_one">
                                                                        <input type="text" maxlength="1" name="otp_two">
                                                                        <input type="text" maxlength="1" name="otp_three">
                                                                        <input type="text" maxlength="1" name="otp_four">
                                                                        <input type="text" maxlength="1" name="otp_five">
                                                                        <input type="text" maxlength="1" name="otp_six">
                                                                    </div>
                                                                    <div class="otp-placeholder-btn-wrapper d-flex justify-content-between mt-2">
                                                                       <button class="otp-resend-btn">Resend OTP</button>
                                                                    </div>
                                                                    <div class="otp-continue">
                                                                        <button class="inactive-btn" type="button"  disabled>Continue</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="form-row d-none">--}}
{{--                                                <div class="form-group col-md-6 mb-0">--}}
{{--                                                    <label--}}
{{--                                                        for="si-password">{{\App\CPU\translate('new_password')}}</label>--}}
{{--                                                    <div class="password-toggle">--}}
{{--                                                        <input class="form-control" name="password" type="password"--}}
{{--                                                               id="password"--}}
{{--                                                        >--}}
{{--                                                        <label class="password-toggle-btn">--}}
{{--                                                            <input class="custom-control-input" type="checkbox"--}}
{{--                                                                   style="display: none">--}}
{{--                                                            <i class="czi-eye password-toggle-indicator"--}}
{{--                                                               onChange="checkPasswordMatch()"></i>--}}
{{--                                                            <span--}}
{{--                                                                class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group col-md-6 mb-0">--}}
{{--                                                    <label--}}
{{--                                                        for="newPass">{{\App\CPU\translate('confirm_password')}} </label>--}}
{{--                                                    <div class="password-toggle">--}}
{{--                                                        <input class="form-control" name="confirm_password"--}}
{{--                                                               type="password"--}}
{{--                                                               id="confirm_password">--}}
{{--                                                        <div>--}}
{{--                                                            <label class="password-toggle-btn">--}}
{{--                                                                <input class="custom-control-input" type="checkbox"--}}
{{--                                                                       style="display: none">--}}
{{--                                                                <i class="czi-eye password-toggle-indicator"--}}
{{--                                                                   onChange="checkPasswordMatch()"></i><span--}}
{{--                                                                    class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div id='message'></div>--}}
{{--                                                </div>--}}
{{--                                                <div--}}
{{--                                                    class="col-12 d-flex flex-wrap justify-content-between __gap-15 __profile-btns">--}}
{{--                                                    <a class="btn btn-danger d-none"--}}
{{--                                                       href="javascript:"--}}
{{--                                                       onclick="route_alert('{{ route('account-delete',[$customerDetail['id']]) }}','{{\App\CPU\translate('want_to_delete_this_account?')}}')">--}}
{{--                                                        {{\App\CPU\translate('delete_account')}}--}}
{{--                                                    </a>--}}
{{--                                                    <button type="submit"--}}
{{--                                                            class="btn btn--primary">{{\App\CPU\translate('update')}}   </button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="form-row">
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="si-password">{{\App\CPU\translate('gender')}}</label>
                                                    <div class="password-toggle">
                                                        <select class="form-control" name="gneder" id="gender">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-0">
                                                    <label
                                                        for="newPass">{{\App\CPU\translate('Date_of_Birth')}} </label>
                                                    <div class="password-toggle">
                                                        <input class="form-control" name="confirm_password" type="date"
                                                               id="confirm_password">
                                                        <div>
                                                        </div>
                                                    </div>
                                                    <div id='message'></div>
                                                </div>
                                                <div
                                                    class="col-12 d-flex flex-wrap justify-content-start __gap-15 __profile-btns">
                                                    <a class="btn btn-danger d-none"
                                                       href="javascript:"
                                                       onclick="route_alert('{{ route('account-delete',[$customerDetail['id']]) }}','{{\App\CPU\translate('want_to_delete_this_account?')}}')">
                                                        {{\App\CPU\translate('delete_account')}}
                                                    </a>
                                                    <button type="submit"
                                                            class="btn profile-form-btn">{{\App\CPU\translate('Save_Changes')}}</button>
                                                    <button class="btn profile-form-btn">{{\App\CPU\translate('Cancel')}}</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card mt-3 mt-lg-4 box-shadow-sm">
                    <div class="card-header">
                        <!--user account header start-->
                        <div class="user-profile-head">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img class="mr-3" style="width: 20px" src="{{asset('assets/front-end/img/kyc.png')}}"
                                         alt="">
                                    <h3 class="font-nameA">{{\App\CPU\translate('KYC_information')}} </h3>
                                </div>
                            </div>
                        </div>
                        <!--user account header start-->
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <form class="mt-0 px-sm-2 pb-2" action="{{route('user-update')}}" method="post"
                                      enctype="multipart/form-data">
                                    <div class="row photoHeader g-3">
                                        <div class="card-body mt-0 pb-5">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    @csrf
                                                    <div class="text-center mb-3 mb-md-0 align-items-center">
                                                        <img id="blah"
                                                             class="rounded-circle border" style="width: 100px; height: 100px;"
                                                             onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                             src="{{asset('application/storage/app/public/profile')}}/{{$customerDetail['image']}}">

                                                        <div class="{{Session::get('direction') === "rtl" ? 'pr-2' : 'pl-2'}}">
                                                            <label for="files"
                                                                   style="cursor: pointer; color:{{$web_config['primary_color']}};"
                                                                   class="spandHeadO m-0">
                                                                {{\App\CPU\translate('change_your_profile')}}
                                                            </label><br>
                                                            <span class="text-danger __text-10px">( * {{\App\CPU\translate('Image ratio should be 1:1')}}  )</span>
                                                            <input id="files" name="image" hidden type="file" required>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <div class="form-group">
                                                        <label for="Name">{{\App\CPU\translate('first_name')}}
                                                            <small class="text-primary">*</small>
                                                        </label>
                                                        <input type="text" class="form-control" id="f_name" name="f_name"
                                                               value="{{$customerDetail['f_name']}}" required>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label
                                                            for="lastName"> {{\App\CPU\translate('middle_name')}} </label>
                                                        <input type="text" class="form-control" id="l_name"
                                                               name="l_name"
                                                               value="">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-0">
                                                    <label
                                                        for="lastName"> {{\App\CPU\translate('last_name')}} </label>
                                                    <input type="text" class="form-control" id="l_name"
                                                           name="l_name"
                                                           value="{{$customerDetail['l_name']}}">
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="phone">{{\App\CPU\translate('Mobile_Number')}}
                                                        <small class="text-primary">*</small>
                                                        <!--<small class="text-primary">(
                                                * {{\App\CPU\translate('country_code_is_must')}} {{\App\CPU\translate('like_for_BD_880')}}
                                                        )</small>-->
                                                    </label>
                                                    <input type="number" class="form-control" type="text" id="phone"
                                                           name="phone"
                                                           value="{{$customerDetail['phone']}}" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="inputEmail4">{{\App\CPU\translate('Email')}}<span class="mx-2 text-success">Verified</span> </label>
                                                    <input type="email" class="form-control" type="email"
                                                           id="account-email"
                                                           value="{{$customerDetail['email']}}">
                                                </div>
                                                <div class="form-group col-md-6 mb-0 d-flex align-items-end">
                                                    <a href="#" class="btn profile-form-btn" data-toggle="modal" data-target="#email-otp">{{\App\CPU\translate('verify')}}</a>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="email-otp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 412px;">
                                                        <div class="modal-content custom-reg-modal">
                                                            <div class="modal-header custom-modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <h5 class="modal-title registration-header mx-auto" id="exampleModalLabel">Almost There</h5>
                                                            <div class="modal-body otp-modal-body">
                                                                <form method="post" id="otp-check-form">
                                                                    <p class="text-center otp-msg mt-2">Please enter the 6 digit OTP that we just sent on <span class="otp-mobile ml-1">+977 1234567890</span></p>
                                                                    <div class="otp-placeholder text-center">
                                                                        <input type="text" maxlength="1" name="otp_one">
                                                                        <input type="text" maxlength="1" name="otp_two">
                                                                        <input type="text" maxlength="1" name="otp_three">
                                                                        <input type="text" maxlength="1" name="otp_four">
                                                                        <input type="text" maxlength="1" name="otp_five">
                                                                        <input type="text" maxlength="1" name="otp_six">
                                                                    </div>
                                                                    <div class="otp-placeholder-btn-wrapper d-flex justify-content-between mt-2">
                                                                        <button class="otp-resend-btn">Resend OTP</button>
                                                                    </div>
                                                                    <div class="otp-continue">
                                                                        <button class="inactive-btn" type="button"  disabled>Continue</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                            <div class="form-row d-none">--}}
                                            {{--                                                <div class="form-group col-md-6 mb-0">--}}
                                            {{--                                                    <label--}}
                                            {{--                                                        for="si-password">{{\App\CPU\translate('new_password')}}</label>--}}
                                            {{--                                                    <div class="password-toggle">--}}
                                            {{--                                                        <input class="form-control" name="password" type="password"--}}
                                            {{--                                                               id="password"--}}
                                            {{--                                                        >--}}
                                            {{--                                                        <label class="password-toggle-btn">--}}
                                            {{--                                                            <input class="custom-control-input" type="checkbox"--}}
                                            {{--                                                                   style="display: none">--}}
                                            {{--                                                            <i class="czi-eye password-toggle-indicator"--}}
                                            {{--                                                               onChange="checkPasswordMatch()"></i>--}}
                                            {{--                                                            <span--}}
                                            {{--                                                                class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>--}}
                                            {{--                                                        </label>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}

                                            {{--                                                <div class="form-group col-md-6 mb-0">--}}
                                            {{--                                                    <label--}}
                                            {{--                                                        for="newPass">{{\App\CPU\translate('confirm_password')}} </label>--}}
                                            {{--                                                    <div class="password-toggle">--}}
                                            {{--                                                        <input class="form-control" name="confirm_password"--}}
                                            {{--                                                               type="password"--}}
                                            {{--                                                               id="confirm_password">--}}
                                            {{--                                                        <div>--}}
                                            {{--                                                            <label class="password-toggle-btn">--}}
                                            {{--                                                                <input class="custom-control-input" type="checkbox"--}}
                                            {{--                                                                       style="display: none">--}}
                                            {{--                                                                <i class="czi-eye password-toggle-indicator"--}}
                                            {{--                                                                   onChange="checkPasswordMatch()"></i><span--}}
                                            {{--                                                                    class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>--}}
                                            {{--                                                            </label>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                    <div id='message'></div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <div--}}
                                            {{--                                                    class="col-12 d-flex flex-wrap justify-content-between __gap-15 __profile-btns">--}}
                                            {{--                                                    <a class="btn btn-danger d-none"--}}
                                            {{--                                                       href="javascript:"--}}
                                            {{--                                                       onclick="route_alert('{{ route('account-delete',[$customerDetail['id']]) }}','{{\App\CPU\translate('want_to_delete_this_account?')}}')">--}}
                                            {{--                                                        {{\App\CPU\translate('delete_account')}}--}}
                                            {{--                                                    </a>--}}
                                            {{--                                                    <button type="submit"--}}
                                            {{--                                                            class="btn btn--primary">{{\App\CPU\translate('update')}}   </button>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            <div class="form-row">
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="si-password">{{\App\CPU\translate('gender')}}</label>
                                                    <div class="">
                                                        <select class="form-control" name="gneder" id="gender">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-0">
                                                    <label
                                                        for="newPass">{{\App\CPU\translate('Date_of_Birth_(AD)')}} </label>
                                                    <div class="">
                                                        <input class="form-control" name="dobAD" type="date"
                                                               id="confirm_password">
                                                        <div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label
                                                        for="newPass">{{\App\CPU\translate('Date_of_Birth_(BS)')}} </label>
                                                    <div class="form-row">
                                                        <div class="col-3 px-1 py-0"><input class="form-control" placeholder="Date" name="dobAD" type="number"
                                                                                  id="confirm_password"></div>
                                                        <div class="col-6 px-1 py-0"><select class="form-control w-100" name="gneder" id="gender">
                                                                <option value="baisakh">Baishakh</option>
                                                                <option value="jestha">Jestha</option>
                                                                <option value="ashar">Ashar</option>
                                                                <option value="sharawan">Sharawan</option>
                                                                <option value="bhadra">Bhadra</option>
                                                                <option value="ashoj">Ashoj</option>
                                                                <option value="kartik">Kartik</option>
                                                                <option value="mangshir">Mangshir</option>
                                                                <option value="poush">Poush</option>
                                                                <option value="magh">Magh</option>
                                                                <option value="falgun">Falgun</option>
                                                                <option value="chaitra">Chaitra</option>
                                                            </select></div>
                                                        <div class="col-3 px-1 py-0"><input class="form-control" placeholder="Year" name="dobAD" type="number"
                                                                                  id="confirm_password"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="si-password">{{\App\CPU\translate('Marital_Status')}}</label>
                                                    <div class="">
                                                        <select class="form-control" name="marital" id="gender">
                                                            <option value="married ">Married</option>
                                                            <option value="unmarried">Unmarried</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="si-password">{{\App\CPU\translate("spouse's_name")}}</label>
                                                    <input class="form-control" placeholder="spouse's name" name="spouse" type="text"
                                                           id="confirm_password">
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="si-password">{{\App\CPU\translate("Father's_name")}}</label>
                                                    <input class="form-control" placeholder="Father's name" name="fathername" type="text"
                                                           id="confirm_password">
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="si-password">{{\App\CPU\translate("Mother's_name")}}</label>
                                                    <input class="form-control" placeholder="Mother's name" name="mothername" type="text"
                                                           id="confirm_password">
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="si-password">{{\App\CPU\translate("Grand_Father's_name")}}</label>
                                                    <input class="form-control" placeholder="Grand Father's name" name="grandfather" type="text"
                                                           id="confirm_password">
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="nationality">{{\App\CPU\translate('nationality')}}</label>
                                                    <div class="">
                                                        <select class="form-control" name="marital" id="nationality">
                                                            <option value="nepali ">Nepali</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="Country">{{\App\CPU\translate('Country')}}</label>
                                                    <div class="">
                                                        <select class="form-control" name="marital" id="Country">
                                                            <option value="nepal ">Nepal</option>
                                                        </select>
                                                    </div>
                                                </div>



                                            </div>
                                            <div>
                                                <div class="form-row">
                                                    <div class="col-12"><h3 class="font-nameA mt-3 text-center" style="font-size: 21px">{{\App\CPU\translate('Address_Information')}}</h3></div>
                                                    <div class="col-12"><h3 class="font-nameA mt-2" style="font-size: 15px;">{{\App\CPU\translate('Permanent_address:')}}</h3></div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="PProvince">{{\App\CPU\translate('Province')}}</label>
                                                        <div class="">
                                                            <select class="form-control" name="Pprovince" id="PProvince">
                                                                <option value="madhesh">{{\App\CPU\translate('Madhesh_Province')}}</option>
                                                                <option value="bagmati">{{\App\CPU\translate('Bagmati_Province')}}</option>
                                                                <option value="LumbiniProvince">{{\App\CPU\translate('Lumbini_Province')}}</option>
                                                                <option value="ProvinceNo.1">{{\App\CPU\translate('	Province_No._1')}}</option>
                                                                <option value="SudurpashchimProvince">{{\App\CPU\translate('Sudurpashchim_Province')}}</option>
                                                                <option value="GandakiProvince">{{\App\CPU\translate('Gandaki_Province')}}</option>
                                                                <option value="KarnaliProvince">{{\App\CPU\translate('Karnali_Province')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="PDistrict">{{\App\CPU\translate('District')}}</label>
                                                        <div class="">
                                                            <select class="form-control" name="Pdistrict" id="PDistrict">
                                                                <option value="Bhaktapur">{{\App\CPU\translate('Bhaktapur')}}</option>
                                                                <option value="Chitwan">{{\App\CPU\translate('Chitwan')}}</option>
                                                                <option value="Dhading">{{\App\CPU\translate('Dhading')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="PMunicipality">{{\App\CPU\translate('Municipality')}}</label>
                                                        <input class="form-control" placeholder="Municipality" name="PMunicipality" type="text"
                                                               id="PMunicipality">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="pWard">{{\App\CPU\translate('Ward_No')}}</label>
                                                        <input class="form-control" placeholder="Ward No" name="pWard" type="text"
                                                               id="pWard">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="pStreet">{{\App\CPU\translate('Street')}}</label>
                                                        <input class="form-control" placeholder="Street" name="pStreet" type="text"
                                                               id="pStreet">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-12"><h3 class="font-nameA mt-2" style="font-size: 15px;">{{\App\CPU\translate('Temporary_address:')}}</h3></div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="TProvince">{{\App\CPU\translate('Province')}}</label>
                                                        <div class="">
                                                            <select class="form-control" name="Tprovince" id="TProvince">
                                                                <option value="madhesh">{{\App\CPU\translate('Madhesh_Province')}}</option>
                                                                <option value="bagmati">{{\App\CPU\translate('Bagmati_Province')}}</option>
                                                                <option value="LumbiniProvince">{{\App\CPU\translate('Lumbini_Province')}}</option>
                                                                <option value="ProvinceNo.1">{{\App\CPU\translate('	Province_No._1')}}</option>
                                                                <option value="SudurpashchimProvince">{{\App\CPU\translate('Sudurpashchim_Province')}}</option>
                                                                <option value="GandakiProvince">{{\App\CPU\translate('Gandaki_Province')}}</option>
                                                                <option value="KarnaliProvince">{{\App\CPU\translate('Karnali_Province')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="TDistrict">{{\App\CPU\translate('District')}}</label>
                                                        <div class="">
                                                            <select class="form-control" name="Tdistrict" id="TDistrict">
                                                                <option value="Bhaktapur">{{\App\CPU\translate('Bhaktapur')}}</option>
                                                                <option value="Chitwan">{{\App\CPU\translate('Chitwan')}}</option>
                                                                <option value="Dhading">{{\App\CPU\translate('Dhading')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="TMunicipality">{{\App\CPU\translate('Municipality')}}</label>
                                                        <input class="form-control" placeholder="Municipality" name="TMunicipality" type="text"
                                                               id="TMunicipality">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="tWard">{{\App\CPU\translate('Ward_No')}}</label>
                                                        <input class="form-control" placeholder="Ward No" name="tWard" type="text"
                                                               id="tWard">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="tStreet">{{\App\CPU\translate('Street')}}</label>
                                                        <input class="form-control" placeholder="Street" name="tStreet" type="text"
                                                               id="tStreet">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-12"><h3 class="font-nameA mt-3 text-center" style="font-size: 21px">{{\App\CPU\translate('Document_Information')}}</h3></div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="idtype">{{\App\CPU\translate('ID_Type')}}</label>
                                                        <div class="">
                                                            <select class="form-control" name="idtype" id="idtype">
                                                                <option value="National_identity">{{\App\CPU\translate('National_identity')}}</option>
                                                                <option value="Passport">{{\App\CPU\translate('Passport')}}</option>
                                                                <option value="Driving_License">{{\App\CPU\translate('Driving_License')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="idnum">{{\App\CPU\translate('ID_Number')}}</label>
                                                        <input class="form-control" placeholder="{{\App\CPU\translate('ID_Number')}}" name="idnum" type="number"
                                                               id="idnum">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="IDissued">{{\App\CPU\translate('ID_issued_place')}}</label>
                                                        <input class="form-control" placeholder="{{\App\CPU\translate('ID_issued_place')}}" name="IDissued" type="text"
                                                               id="IDissued">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label
                                                            for="issuedAD">{{\App\CPU\translate('ID_issued_date_(AD)')}} </label>
                                                        <div class="">
                                                            <input class="form-control" name="issuedAD" type="date"
                                                                   id="issuedAD">
                                                            <div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label
                                                            for="dateBs">{{\App\CPU\translate('ID_issued_date_(BS)')}} </label>
                                                        <div class="form-row">
                                                            <div class="col-3 px-1 py-0"><input class="form-control" placeholder="Date" name="dateBs" type="number"
                                                                                                id="dateBs"></div>
                                                            <div class="col-6 px-1 py-0"><select class="form-control w-100" name="gneder" id="gender">
                                                                    <option value="baisakh">Baishakh</option>
                                                                    <option value="jestha">Jestha</option>
                                                                    <option value="ashar">Ashar</option>
                                                                    <option value="sharawan">Sharawan</option>
                                                                    <option value="bhadra">Bhadra</option>
                                                                    <option value="ashoj">Ashoj</option>
                                                                    <option value="kartik">Kartik</option>
                                                                    <option value="mangshir">Mangshir</option>
                                                                    <option value="poush">Poush</option>
                                                                    <option value="magh">Magh</option>
                                                                    <option value="falgun">Falgun</option>
                                                                    <option value="chaitra">Chaitra</option>
                                                                </select></div>
                                                            <div class="col-3 px-1 py-0"><input class="form-control" placeholder="Year" name="dobAD" type="number"
                                                                                                id="confirm_password"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="front_Image">{{\App\CPU\translate('ID_Front_Image')}}</label>
                                                        <input class="form-control" placeholder="{{\App\CPU\translate('ID_front_Image')}}" name="front_Image" type="file"
                                                               id="front_Image">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-0">
                                                        <label for="back_Image">{{\App\CPU\translate('ID_Front_Image')}}</label>
                                                        <input class="form-control" placeholder="{{\App\CPU\translate('ID_back_Image')}}" name="back_Image" type="file"
                                                               id="back_Image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div
                                                    class="col-12 d-flex flex-wrap justify-content-start __gap-15 __profile-btns">
                                                    <a class="btn btn-danger d-none"
                                                       href="javascript:"
                                                       onclick="route_alert('{{ route('account-delete',[$customerDetail['id']]) }}','{{\App\CPU\translate('want_to_delete_this_account?')}}')">
                                                        {{\App\CPU\translate('delete_account')}}
                                                    </a>
                                                    <button type="submit"
                                                            class="btn profile-form-btn">{{\App\CPU\translate('Save_Changes')}}</button>
                                                    <button class="btn profile-form-btn">{{\App\CPU\translate('Cancel')}}</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </form>
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
