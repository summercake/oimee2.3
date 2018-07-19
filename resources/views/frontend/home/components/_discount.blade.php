<div class="container">
    <div class="row " id="adv-first">
        <div class="col-4 ">
            <h5 id="tags">
                <a href="" class="btn btn-outline-primary mr-1">最近折扣</a>
                <a href="" class="btn btn-outline-primary mx-1">关注最多</a>
                <a href="" class="btn btn-outline-primary mx-1">国货折扣</a>
            </h5>
        </div>
    </div>
    <div class="row" id="adv-second">
        <div class="col-8">
            @include('frontend.home.components.single-dis-info-row')
            @include('frontend.home.components.nest-dis-info-row')
        </div>
        <div class="col-4">
            @include('frontend.layouts._dis-info-right')
        </div>
    </div>
</div>