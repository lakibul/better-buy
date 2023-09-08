<div class="row rtl">
    <div class="col-xl-12 col-md-12 __top-slider-images non-auth-slider" style="padding-top: 24px; padding-bottom: 24px;">
        @php($main_banner=\App\Model\Banner::where('banner_type','Main Banner')->where('published',1)->orderBy('id','desc')->get())
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($main_banner as $key=>$banner)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}"
                        class="{{$key==0?'active':''}}">
                    </li>
                @endforeach
            </ol>
            <div class="carousel-inner" style="border-radius: 15px;box-shadow: 0px 4px 16px rgba(22, 100, 162, 0.2);">
                @foreach($main_banner as $key=>$banner)
                    <div class="carousel-item {{$key==0?'active':''}}">
                        <a href="{{$banner['url']}}">
                            <img class="d-block w-100 __slide-img"
                                 onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                 src="{{asset('application/storage/app/public/banner')}}/{{$banner['photo']}}"
                                 alt="">
                        </a>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev carousel-control-prev-custom" href="#carouselExampleIndicators" role="button"
               data-slide="prev">
                <div class="slider-icon-outer ">
                    <i class="slider-icon-custom fa fa-caret-left"></i>
                <span class="sr-only">{{\App\CPU\translate('Previous')}}</span>
                </div>
            </a>
            <a class="carousel-control-next carousel-control-next-custom" href="#carouselExampleIndicators" role="button"
               data-slide="next">
                <div class="slider-icon-outer ">
                <i class="slider-icon-custom fa fa-caret-right"></i>
                <span class="sr-only">{{\App\CPU\translate('Next')}}</span>
                </div>
            </a>
        </div>


    </div>
    <!-- Banner group-->
</div>


<script>
    $(function () {
        $('.list-group-item').on('click', function () {
            $('.glyphicon', this)
                .toggleClass('glyphicon-chevron-right')
                .toggleClass('glyphicon-chevron-down');
        });
    });
</script>
