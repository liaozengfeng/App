@extends('index.layouts.layouts')
@section('title')
    news info
@endsection
@section('content')
    <div class="inner met_flash">
        <div class="flash">
            <a href='#' target='_blank' title='企业网站管理系统'><img src='img/1342430358.jpg' width='980' alt='企业网站管理系统' height='90'></a>
        </div>
    </div>
    <div class="sidebar inner">
        <div class="sb_nav">

            <h3 class='title myCorner' data-corner='top 5px'>个人新闻</h3>
            <div class="active" id="sidebar" data-csnow="2" data-class3="0" data-jsok="2">
                @foreach($cart_info as $v)
                    <dl class="list-none navnow"><dt id='part2_4'><a href='/index/cart/list?id={{ $v['c_id'] }}'  title='{{ $v['c_name'] }}' class="zm"><span>{{ $v['c_name'] }}</span></a></dt></dl>
                @endforeach
                <div class="clear">
                </div>
            </div>

            <h3 class='title line myCorner' data-corner='top 5px'>平台介绍</h3>
            <div class="active editor"><div>
                    <strong>私人项目</strong>不接受评论,不接受反驳,不接受意见!!</div>
                <div>
                    开心有限公司</div>
                <div>
                    电 &nbsp;话：一三九白酒啤酒葡萄酒</div>
                <div>
                    邮 &nbsp;编：A_ZC</div>
                <div>
                    Email：困难户,欢迎各位大佬资助</div>
                <div>
                    网 &nbsp;址：http://post_program.com</div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="sb_box">
            <h3 class="title">
                研发团队
            </h3>
            <div class="clear"></div>

            <div class="active" id="newslist">
                <ul class='list-none metlist'>
                    <li class='list top'><span></span><a href='javascript:;' target='_self'><h4>项目负责人: 张挺</h4></a></li>
                    <li class='list top'><span></span><a href='javascript:;' target='_self'><h4>研发组长: 郭啸</h4></a></li>
                    <li class='list top'><span></span><a href='javascript:;' target='_self'>研发组员: 郭啸</a></li>
                    <li class='list top'><span></span><a href='javascript:;' target='_self'>前台研发人员: 郭啸</a></li>
                    <li class='list top'><span></span><a href='javascript:;' target='_self'>后台研发人员: 郭啸</a></li>
                    <li class='list top'><span></span><a href='javascript:;' target='_self'>融资: 人力(郭啸) 资金(无)</a></li>
                    <li class='list top'><span></span><a href='javascript:;' target='_self'>官网: /*因资金不足,人员不够,发展方向不确定,所以暂缓发布!!*/</a></li>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <script>
        
    </script>
@endsection