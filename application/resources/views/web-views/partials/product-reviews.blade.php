@foreach ($productReviews as $productReview)
<div class="p-2" style="margin-bottom: 20px">
    <div class="row product-review d-flex ">
        <div
            class="col-md-12 d-flex mb-3 {{Session::get('direction') === "rtl" ? 'pl-5' : 'pr-5'}}">
            <div
                class="d-flex {{Session::get('direction') === "rtl" ? 'ml-4 pl-2' : 'mr-4 pr-2'}}">
{{--                <img class="rounded-circle __img-64 object-cover"--}}
{{--                    onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"--}}
{{--                    src="{{asset("application/storage/app/public/profile")}}/{{(isset($productReview->user)?$productReview->user->image:'')}}"--}}
{{--                    alt="{{isset($productReview->user)?$productReview->user->f_name:'not exist'}}"/>--}}
                <div
                    class="d-flex text-body">
                    <div class="">
                        <span class="font-size-sm mb-0" style="font-weight: 500;font-size: 20px !important;">{{isset($productReview->user)?$productReview->user->f_name:'not exist'}}</span>
                        <div class="d-flex pr-2" style="border-right: 2px solid #D9D9D9;">
                            <div class="star-rating mt-0"
                                 style="{{Session::get('direction') === "rtl" ? 'margin-left: 25px;' : 'margin-right: 10px;'}}">
                                @for($inc=0;$inc<5;$inc++)
                                    @if($inc<$overallRating[0])
                                        <i class="sr-star czi-star-filled active" style="font-size: 20px;"></i>
                                    @else
                                        <i class="sr-star czi-star-filled" style="font-size: 20px;"></i>
                                    @endif
                                @endfor
                            </div>
                            <div
                                class="text-body" style="font-weight: 400;font-size: 15px;">({{$productReview->rating}}.0)</div>
                        </div>
                    </div>
                    <div class="ml-3">
                        <div class="d-flex">
                            <div><i class="fa fa-check" style="font-size: 5px; padding: 4px; color: #ffffff; background-color: #77b847; border-radius: 50%;"></i></div>
                            <p class="mb-0 ml-2 mt-1" style="font-weight: 600;font-size: 16px; color: #000000;">Verified Purchase</p>
                        </div>
                        <div class="text-body">
                            <span style="font-weight: 400;font-size: 16px; color: #656565">{{$productReview->updated_at->format('M-d-Y')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p class="mb-3 text-body __text-sm" style="word-wrap:break-word; color: #161D25;">{{$productReview->comment}}</p>
            @if (!empty(json_decode($productReview->attachment)))
                @foreach (json_decode($productReview->attachment) as $key => $photo)
                    <img onclick="showInstaImage('{{asset("application/storage/app/public/review/$photo")}}')" class="cz-image-zoom __img-70 rounded border" onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'" src="{{asset("application/storage/app/public/review/$photo")}}" alt="Product review">
                @endforeach
            @endif
        </div>
    </div>
</div>
@endforeach
