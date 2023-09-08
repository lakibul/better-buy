<style>
    .list-group-item li, a {
        color: {{$web_config['primary_color']}};
    }

    .list-group-item li, a:hover {
        color: {{$web_config['secondary_color']}};
    }
</style>
<ul class="list-group list-group-flush">
    @foreach($products as $i)
        <li class="list-group-item" onclick="$('.search_form').submit()">
            <a style="color: #656565; font-size: 14px; font-weight: 500;" href="javascript:" onmouseover="$('.search-bar-input-mobile').val('{{$i['name']}}');$('.search-bar-input').val('{{$i['name']}}');">
                {{$i['name']}}
            </a>
        </li>
    @endforeach
    <li class="list-group-item search-hot-product">
        <a href="#">
            <div class="d-flex align-items-center">
                <img src="{{asset('assets/front-end/img/tv.jpg')}}" alt="product Image">
                <div class="px-4">
                    <h5 class="product-name">Sensei 43" INCH SMART LED TV</h5>
                    <p class="mb-0 produact-price">₹ 1,89,590  <span class="discount-price">₹ 2,40,490</span></p>
                </div>
               <div class="align-items-center d-flex">
                   <span class="discount-text">42% Off</span>
               </div>
            </div>
        </a>
    </li>
</ul>
