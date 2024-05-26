@extends('layout.master_shopping')

@section('content')
<style>
	#bannerWrapper {
    display: none; /* hoặc visibility: hidden; */
}
</style>
    <div class="wrap-breadcrumb">
        <div class="clearfix container">
            <div class="row main-header">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                    <ol class="breadcrumb breadcrumb-arrows">
                        <li><a href="/" target="_self">Trang chủ</a></li>
                        <li><a href="/collections/dong-ho-chong-nuoc" target="_self">Đồng hồ nổi bật</a>
                        </li>
                        <li class="active"><span> ĐỒNG HỒ NAM TEVISE 1952 CHẠY CƠ CỰC CHẤT</span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section id="content" class="clearfix container">
        <div class="row">
            <div id="product" class="content-pages" data-sticky_parent>
                <div class="col-md-3 col-sm-12 col-xs-12  leftsidebar-col" data-sticky_column>
                    <div class="group_sidebar">

                        <div class="list-group navbar-inner ">


                            <div class="mega-left-title btn-navbar title-hidden-sm">
                                <h3 class="sb-title">Danh mục </h3>
                            </div>

                            <ul class="nav navs sidebar menu" id='cssmenu'>




                                <li class="item  first">
                                    <a href="/collections/onsale">
                                        <span>Sản phẩm khuyến mãi</span>
                                    </a>
                                </li>





                                <li class="item  ">
                                    <a href="/collections/hot-products">
                                        <span>Sản phẩm nổi bật</span>
                                    </a>
                                </li>





                                <li class="item  last">
                                    <a href="/collections/all">
                                        <span>Tất cả sản phẩm</span>
                                    </a>
                                </li>


                            </ul>

                        </div>

                        <!-- Banner quảng cáo -->
                        <div class="list-group_l banner-left hidden-sm hidden-xs">

                            <a href="">
                                <img src="./theme.hstatic.net/1000177652/1000229231/14/left_image_ad.jpg?v=90">
                            </a>

                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            //$('ul li:has(ul)').addClass('hassub');
                            $('#cssmenu ul ul li:odd').addClass('odd');
                            $('#cssmenu ul ul li:even').addClass('even');
                            $('#cssmenu > ul > li > a').click(function() {
                                $('#cssmenu li').removeClass('active');
                                $(this).closest('li').addClass('active');
                                var checkElement = $(this).nextS();
                                if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                                    $(this).closest('li').removeClass('active');
                                    checkElement.slideUp('normal');
                                }
                                if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                                    $('#cssmenu ul ul:visible').slideUp('normal');
                                    checkElement.slideDown('normal');
                                }
                                if ($(this).closest('li').find('ul').children().length == 0) {
                                    return true;
                                } else {
                                    return false;
                                }
                            });

                            $('.drop-down').click(function(e) {
                                if ($(this).parents('li').hasClass('has-sub')) {
                                    e.preventDefault();
                                    if ($(this).hasClass('open-nav')) {
                                        $(this).removeClass('open-nav');
                                        $(this).parents('li').children('ul.lve2').slideUp('normal').removeClass('in');
                                    } else {
                                        $(this).addClass('open-nav');
                                        $(this).parents('li').children('ul.lve2').slideDown('normal').addClass('in');
                                    }
                                } else {

                                }
                            });

                        });

                        $("#list-group-l ul.navs li.active").parents('ul.children').addClass("in");
                    </script>

                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" data-sticky_column>
                    <div id="wrapper-detail" class="product-page">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div id="surround">

                                    <div class="product-sale">

                                        <span>
                                            <label class="sale-lb">-</label> {{ $productdetail->discount }} %
                                        </span>
                                    </div>


                                    <a class="slide-prev slide-nav" href="javascript:">
                                        <i class="fa fa-arrow-circle-o-left fa-2"></i>
                                    </a>
                                    <a class="slide-next slide-nav" href="javascript:">
                                        <i class="fa fa-arrow-circle-o-right fa-2"></i>
                                    </a>
                                    <img class="product-image-feature"
                                        src="{{ asset($productdetail->image) }}"
                                        alt="{{ $productdetail->name }}">
                                    <div id="sliderproduct" class="">
                                        <ul class="slides">
											@foreach ($listImages as $image)
											<li class="product-thumb">
                                                <a href="javascript:"
                                                    data-image="{{ asset($image) }}"
                                                    data-zoom-image="{{ asset($image) }}"
                                                    src="{{ asset($image) }}">
                                                    <img alt="ĐỒNG HỒ NAM TEVISE 1952 CHẠY CƠ CỰC CHẤT"
                                                        data-image="{{ asset($image) }}"
                                                        src="{{ asset($image) }}">
                                                </a>
                                            </li>
											@endforeach
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="product-title">
                                    <h1>{{ $productdetail->name }}</h1>

                                    <span id="pro_sku"></span>

                                </div>
                                <div class="product-price" id="price-preview">

                                    <span>{{ $productdetail->price }}</span><del>1,200,000₫</del>
                                </div>
                                <form id="add-item-form" action="/cart/add" method="post" class="variants clearfix">
                                    <div class="select clearfix" style="display:none">
                                        <select id="product-select" name="id" style="display:none">

                                            <option value="1012006173">Default Title - 800,000₫</option>

                                        </select>
                                    </div>

                                    <div class="select-wrapper ">
                                        <label>Số lượng</label>
                                        <input id="quantity" type="number" name="quantity" min="1"
                                            value="1" class="tc item-quantity" />
                                    </div>


                                    <div class="row">
                                        {{-- <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                            <a href="{{ route('showindexcart') }}"><button
                                                class=" btn-detail btn-color-add btn-min-width btn-mgt addtocart-modal"
                                                name="value">
                                                Thêm vào giỏ
                                            </button></a>
                                        </div> --}}
										{{-- <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
											<a href="{{ route('showindexcart') }}" class="btn-detail btn-color-add btn-min-width btn-mgt addtocart-modal">
												Thêm vào giỏ
											</a>
										</div> --}}
										
										<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
											<a href="{{ route('addtocart',$productdetail->id_product) }}"><button
											type="button" class="btn-detail btn-color-add btn-min-width btn-mgt addtocart-modal">
												Thêm vào giỏ
											</button></a>
											
										</div>
                                        <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                            <a href="{{ route('buyproductnow') }}"><button type="button"
                                                class=" btn-detail btn-color-buy btn-min-width btn-mgt">
                                                Mua ngay
                                            </button></a>
                                        </div>
                                    </div>
                                </form>
                                <div class="pt20">
                                    <!-- Begin tags -->
                                    <div class="tag-wrapper">
                                        <label>
                                            Tags:
                                        </label>
                                        <ul class="tags">

                                            <li class="active">
                                                <a href="/collections/all/phu-kien-nam">phụ kiện nam</a>
                                            </li>

                                            <li class="active">
                                                <a href="/collections/all/thoi-trang-nam">thời trang
                                                    nam</a>
                                            </li>

                                            <li class="active">
                                                <a href="/collections/all/dong-ho-co">đồng hồ cơ</a>
                                            </li>

                                            <li class="active">
                                                <a href="/collections/all/dong-ho">đồng hồ</a>
                                            </li>

                                            <li class="active">
                                                <a href="/collections/all/tevise">tevise</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <!-- End tags -->
                                </div>
                                <div class="pt20">
                                    <!-- Begin social icons -->
                                    <div class="addthis_toolbox addthis_default_style ">

                                        <div class="info-socials-article clearfix">
                                            <div class="box-like-socials-article">
                                                <div class="fb-send"
                                                    data-href="/products/dong-ho-nam-tevise-1952-chay-co-cuc-chat">
                                                </div>
                                            </div>
                                            <div class="box-like-socials-article">
                                                <div class="fb-like"
                                                    data-href="/products/dong-ho-nam-tevise-1952-chay-co-cuc-chat"
                                                    data-layout="button_count" data-action="like">
                                                </div>
                                            </div>
                                            <div class="box-like-socials-article">
                                                <div class="fb-share-button"
                                                    data-href="/products/dong-ho-nam-tevise-1952-chay-co-cuc-chat"
                                                    data-layout="button_count">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End social icons -->
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                                <div role="tabpanel" class="product-comment">
                                    <!-- Nav tabs -->
                                    <ul class="nav visible-lg visible-md" role="tablist">
                                        <li role="presentation" class="active"><a data-spy="scroll" data-target="#mota"
                                                href="#mota" aria-controls="mota" role="tab">Mô tả sản phẩm</a>
                                        </li>

                                        <li role="presentation">
                                            <a data-spy="scroll" href="#binhluan" aria-controls="binhluan"
                                                role="tab">Bình luận</a>
                                        </li>


                                        <li role="presentation">
                                            <a data-spy="scroll" href="#like" aria-controls="like" role="tab">Sản
                                                phẩm khác</a>
                                        </li>

                                    </ul>
                                    <!-- Tab panes -->

                                    <div id="mota">

                                        <div class="title-bl visible-xs visible-sm">
                                            <h2>Mô tả</h2>
                                        </div>

                                        <div class="product-description-wrapper">

                                            <table border="0" cellpadding="4" cellspacing="4"
                                                style="height: 227px; border-color: #000000; width: 633px; float: left;"
                                                class="mce-item-table"
                                                data-mce-style="height: 227px; border-color: #000000; width: 633px; float: left;">
                                                <tbody>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Tình
                                                                    trạng</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">:
                                                                Mới</span>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Nguồn
                                                                    gốc</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">: Hàng
                                                                công ty</span>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Bảo
                                                                    hành</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">: 6
                                                                tháng</span>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Chất
                                                                    liệu vỏ</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">: Thép
                                                                cao cấp không ghỉ</span>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Chất
                                                                    liệu mặt&nbsp;</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">: Kính
                                                                cao cấp chống xước</span>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Năng
                                                                    lượng sử dụng</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">: Chạy
                                                                cơ</span>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Chống
                                                                    nước</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">:
                                                                5ATM</span>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Kích
                                                                    thước mặt đồng hồ</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">:
                                                                40mm</span>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Kích
                                                                    thước dây đồng hồ</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">:
                                                                22mm</span>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Cho
                                                                    hàng kiểm tra trước khi
                                                                    nhận</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">: Ship
                                                                toàn quốc nhận hàng thu tiền</span>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 13px;" data-mce-style="height: 13px;">
                                                        <td style="width: 318.5px; height: 13px;"
                                                            data-mce-style="width: 318.5px; height: 13px;">
                                                            <strong><span style="font-size: 15pt;"
                                                                    data-mce-style="font-size: 15pt;">Tư
                                                                    vấn và đặt hàng</span></strong>
                                                        </td>
                                                        <td style="width: 332.5px; height: 13px;"
                                                            data-mce-style="width: 332.5px; height: 13px;">
                                                            <span style="font-size: 15pt;"
                                                                data-mce-style="font-size: 15pt;">: <span
                                                                    style="color: #ff0000;"
                                                                    data-mce-style="color: #ff0000;">
                                                                    0978.828.888</span></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="binhluan">
                                        <div class="title-bl">
                                            <h2>Bình luận</h2>
                                        </div>
                                        <div class="product-comment-fb">
                                            <div id="fb-root"></div>
                                            <div class="fb-comments"
                                                data-href="http://happylive.vn/products/dong-ho-nam-tevise-1952-chay-co-cuc-chat"
                                                data-numposts="5" width="100%" data-colorscheme="light"></div>
                                            <!-- script comment fb -->
                                            <script type="text/javascript">
                                                (function(d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0];
                                                    if (d.getElementById(id)) return;
                                                    js = d.createElement(s);
                                                    js.id = id;
                                                    js.src = "./connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }(document, 'script', 'facebook-jssdk'));
                                            </script>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12  list-like">
                        <div id="like">
                            <div class="title-like">
                                <h2>Sản phẩm khác</h2>
                            </div>
                            <div class="row product-list ">
                                <div class="content-product-list">
                                    <div class="col-md-3 col-sm-6 col-xs-12 pro-loop">
                                        <div class="product-block product-resize">
                                            <div class="product-img image-resize view view-third">

                                                <div class="product-sale">
                                                    <span><label class="sale-lb">- </label> 29%</span>
                                                </div>
                                                <a href="/products/dong-ho-nam-skmei-kim-xanh-duong"
                                                    title="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG">
                                                    <img class="first-image  has-img"
                                                        alt=" ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG "
                                                        src="./product.hstatic.net/1000177652/product/1_e0ed7c0240734782a8268793dce0b9b8_large.jpg" />

                                                    <img class ="second-image"
                                                        src="./product.hstatic.net/1000177652/product/2_85fc5908867e488da92b768cb240477d_large.jpg"
                                                        alt=" ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG " />

                                                </a>
                                                <div class="actionss">
                                                    <div class="btn-cart-products">
                                                        <a href="javascript:void(0);"
                                                            onclick="add_item_show_modalCart(1012030836)">
                                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                    <div class="view-details">
                                                        <a href="/collections/dong-ho-chong-nuoc/products/dong-ho-nam-skmei-kim-xanh-duong"
                                                            class="view-detail">
                                                            <span><i class="fa fa-clone"> </i></span>
                                                        </a>
                                                    </div>
                                                    <div class="btn-quickview-products">
                                                        <a href="javascript:void(0);" class="quickview"
                                                            data-handle="/products/dong-ho-nam-skmei-kim-xanh-duong"><i
                                                                class="fa fa-eye"></i></a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-detail clearfix">
                                                <!-- sử dụng pull-left -->
                                                <h3 class="pro-name"><a
                                                        href="/collections/dong-ho-chong-nuoc/products/dong-ho-nam-skmei-kim-xanh-duong"
                                                        title="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG">ĐỒNG HỒ
                                                        NAM SKMEI KIM XANH DƯƠNG </a></h3>
                                                <div class="pro-prices">
                                                    <p class="pro-price">499,000₫</p>
                                                    <p class="pro-price-del text-left"><del
                                                            class="compare-price">700,000₫</del></p>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 pro-loop">
                                        <div class="product-block product-resize">
                                            <div class="product-img image-resize view view-third">

                                                <div class="product-sale">
                                                    <span><label class="sale-lb">- </label> 33%</span>
                                                </div>
                                                <a href="/products/dong-ho-nam-tevise-chay-co-mat-cham-rong-cuc-sang-1"
                                                    title="ĐỒNG HỒ NAM TEVISE CHẠY CƠ MẶT CHẠM RỘNG CỰC SANG.">
                                                    <img class="first-image  has-img"
                                                        alt=" ĐỒNG HỒ NAM TEVISE CHẠY CƠ MẶT CHẠM RỘNG CỰC SANG. "
                                                        src="./product.hstatic.net/1000177652/product/582a59a31d974d1dc5b1fec7-3-original_large.jpg" />

                                                    <img class ="second-image"
                                                        src="./product.hstatic.net/1000177652/product/58a8390735d131532b2a8cf4-6-original_large.jpg"
                                                        alt=" ĐỒNG HỒ NAM TEVISE CHẠY CƠ MẶT CHẠM RỘNG CỰC SANG. " />

                                                </a>
                                                <div class="actionss">
                                                    <div class="btn-cart-products">
                                                        <a href="javascript:void(0);"
                                                            onclick="add_item_show_modalCart(1012030907)">
                                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                    <div class="view-details">
                                                        <a href="/collections/dong-ho-chong-nuoc/products/dong-ho-nam-tevise-chay-co-mat-cham-rong-cuc-sang-1"
                                                            class="view-detail">
                                                            <span><i class="fa fa-clone"> </i></span>
                                                        </a>
                                                    </div>
                                                    <div class="btn-quickview-products">
                                                        <a href="javascript:void(0);" class="quickview"
                                                            data-handle="/products/dong-ho-nam-tevise-chay-co-mat-cham-rong-cuc-sang-1"><i
                                                                class="fa fa-eye"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-detail clearfix">
                                                <!-- sử dụng pull-right -->
                                                <h3 class="pro-name"><a
                                                        href="/collections/dong-ho-chong-nuoc/products/dong-ho-nam-tevise-chay-co-mat-cham-rong-cuc-sang-1"
                                                        title="ĐỒNG HỒ NAM TEVISE CHẠY CƠ MẶT CHẠM RỘNG CỰC SANG.">ĐỒNG
                                                        HỒ NAM TEVISE CHẠY CƠ MẶT CHẠM RỘNG CỰC SANG. </a>
                                                </h3>
                                                <div class="pro-prices">
                                                    <p class="pro-price">1,200,000₫</p>
                                                    <p class="pro-price-del text-left"><del
                                                            class="compare-price">1,800,000₫</del></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 pro-loop">
                                        <div class="product-block product-resize">
                                            <div class="product-img image-resize view view-third">

                                                <div class="product-sale">
                                                    <span><label class="sale-lb">- </label> 33%</span>
                                                </div>
                                                <a href="/products/dong-ho-nam-tevise-chay-co-mat-cham-rong-cuc-sang"
                                                    title="ĐỒNG HỒ NAM TEVISE CHẠY CƠ MẶT CHẠM RỘNG CỰC SANG.">
                                                    <img class="first-image  has-img"
                                                        alt=" ĐỒNG HỒ NAM TEVISE CHẠY CƠ MẶT CHẠM RỘNG CỰC SANG. "
                                                        src="./product.hstatic.net/1000177652/product/1_ce1a513f5b4e432fa372126291449cac_large.jpg" />

                                                    <img class ="second-image"
                                                        src="./product.hstatic.net/1000177652/product/4_4f633974980d4c87b3652a202a3f1f38_large.jpg"
                                                        alt=" ĐỒNG HỒ NAM TEVISE CHẠY CƠ MẶT CHẠM RỘNG CỰC SANG. " />

                                                </a>
                                                <div class="actionss">
                                                    <div class="btn-cart-products">
                                                        <a href="javascript:void(0);"
                                                            onclick="add_item_show_modalCart(1012006066)">
                                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                    <div class="view-details">
                                                        <a href="/collections/dong-ho-chong-nuoc/products/dong-ho-nam-tevise-chay-co-mat-cham-rong-cuc-sang"
                                                            class="view-detail">
                                                            <span><i class="fa fa-clone"> </i></span>
                                                        </a>
                                                    </div>
                                                    <div class="btn-quickview-products">
                                                        <a href="javascript:void(0);" class="quickview"
                                                            data-handle="/products/dong-ho-nam-tevise-chay-co-mat-cham-rong-cuc-sang"><i
                                                                class="fa fa-eye"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="product-detail clearfix">
                                                <!-- sử dụng pull-left -->
                                                <h3 class="pro-name"><a
                                                        href="/collections/dong-ho-chong-nuoc/products/dong-ho-nam-tevise-chay-co-mat-cham-rong-cuc-sang"
                                                        title="ĐỒNG HỒ NAM TEVISE CHẠY CƠ MẶT CHẠM RỘNG CỰC SANG.">ĐỒNG
                                                        HỒ NAM TEVISE CHẠY CƠ MẶT CHẠM RỘNG CỰC SANG. </a>
                                                </h3>
                                                <div class="pro-prices">
                                                    <p class="pro-price">1,200,000₫</p>
                                                    <p class="pro-price-del text-left"><del
                                                            class="compare-price">1,800,000₫</del></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 pro-loop">
                                        <div class="product-block product-resize">
                                            <div class="product-img image-resize view view-third">

                                                <div class="product-sale">
                                                    <span><label class="sale-lb">- </label> 33%</span>
                                                </div>
                                                <a href="/products/dong-ho-nam-tevise-mat-trang-chay-co-cuc-chat"
                                                    title="ĐỒNG HỒ NAM TEVISE MẶT TRẮNG CHẠY CƠ CỰC CHẤT">
                                                    <img class="first-image  has-img"
                                                        alt=" ĐỒNG HỒ NAM TEVISE MẶT TRẮNG CHẠY CƠ CỰC CHẤT "
                                                        src="./product.hstatic.net/1000177652/product/1_ab30605be61d4f99bd2306a6a537cfb7_large.jpg" />

                                                    <img class ="second-image"
                                                        src="./product.hstatic.net/1000177652/product/2_688f14ff08684d938f519838b561e591_large.jpg"
                                                        alt=" ĐỒNG HỒ NAM TEVISE MẶT TRẮNG CHẠY CƠ CỰC CHẤT " />

                                                </a>
                                                <div class="actionss">
                                                    <div class="btn-cart-products">
                                                        <a href="javascript:void(0);"
                                                            onclick="add_item_show_modalCart(1012006083)">
                                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                    <div class="view-details">
                                                        <a href="/collections/dong-ho-chong-nuoc/products/dong-ho-nam-tevise-mat-trang-chay-co-cuc-chat"
                                                            class="view-detail">
                                                            <span><i class="fa fa-clone"> </i></span>
                                                        </a>
                                                    </div>
                                                    <div class="btn-quickview-products">
                                                        <a href="javascript:void(0);" class="quickview"
                                                            data-handle="/products/dong-ho-nam-tevise-mat-trang-chay-co-cuc-chat"><i
                                                                class="fa fa-eye"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-detail clearfix">
                                                <!-- sử dụng pull-right -->
                                                <h3 class="pro-name"><a
                                                        href="/collections/dong-ho-chong-nuoc/products/dong-ho-nam-tevise-mat-trang-chay-co-cuc-chat"
                                                        title="ĐỒNG HỒ NAM TEVISE MẶT TRẮNG CHẠY CƠ CỰC CHẤT">ĐỒNG
                                                        HỒ NAM TEVISE MẶT TRẮNG CHẠY CƠ CỰC CHẤT </a></h3>
                                                <div class="pro-prices">
                                                    <p class="pro-price">800,000₫</p>
                                                    <p class="pro-price-del text-left"><del
                                                            class="compare-price">1,200,000₫</del></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var add_to_wishlist = function() {
                                    if (typeof(Storage) !== "undefined") {
                                        if (localStorage.recently_viewed) {

                                            if (localStorage.recently_viewed.indexOf('1st-birthday-princess-basic-party-kit-18-guests') == -1)
                                                localStorage.recently_viewed = '1st-birthday-princess-basic-party-kit-18-guests_' + localStorage
                                                .recently_viewed;

                                        } else
                                            localStorage.recently_viewed = '1st-birthday-princess-basic-party-kit-18-guests';
                                    } else {
                                        console.log('Your Browser does not support storage!');
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(".product-thumb img").click(function() {
                    $(".product-thumb").removeClass('active');
                    $(this).parents('li').addClass('active');
                    $(".product-image-feature").attr("src", $(this).attr("data-image"));
                    $(".product-image-feature").attr("data-zoom-image", $(this).attr("data-zoom-image"));
                });

                $(".product-thumb").first().addClass('active');
            </script>
            <script>
                $(document).ready(function() {
                    $('#add-to-cart').click(function(e) {
                        e.preventDefault();
                        $(this).addClass('clicked_buy');
                        add_item_show_modalCart($('#product-select').val());
                    });
                    $('#buy-now').click(function(e) {
                        e.preventDefault();
                        $.ajax({
                            type: 'POST',
                            async: false,
                            url: '/cart/add.js',
                            async: false,
                            data: $('form#add-item-form').serialize(),
                            success: function(line) {
                                window.location = "/checkout";
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                alert('Sản phẩm bạn vừa mua đã vượt quá tồn kho');
                            }
                        });
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('a[data-spy=scroll]').click(function() {
                        event.preventDefault();
                        $('body').animate({
                            scrollTop: ($($(this).attr('href')).offset().top - 20) + 'px'
                        }, 500);
                    })
                });

               
                // The following piece of code can be ignored.
                $(function() {
                    $(window).resize(function() {
                        $('#info').text("Page width: " + $(this).width());
                    });
                    $(window).trigger('resize');
                });
                var selectCallback = function(variant, selector) {
                    if (variant && variant.available) {
                        if (variant.featured_image != null) {
                            $(".product-thumb").removeClass('active');
                            $(".product-thumb img[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'master') +
                                "']").click().parents('li').addClass('active');
                        }
                        if (variant.sku != null) {
                            jQuery('#pro_sku').html('SKU: ' + variant.sku);
                        }
                        jQuery('#add-to-cart').removeAttr('disabled').removeClass('disabled').html("Thêm vào giỏ");;
                        jQuery('#buy-now').removeAttr('disabled').removeClass('disabled').html("Mua ngay").show();

					}
                };
                jQuery(document).ready(function($) {
                });
            </script>
            <script>
                $(document).ready(function() {
                    if ($(".slides .product-thumb").length > 4) {
                        $('#sliderproduct').flexslider({
                            animation: "slide",
                            controlNav: false,
                            animationLoop: false,
                            slideshow: false,
                            itemWidth: 95,
                            itemMargin: 10,
                        });
                    }
                    if ($(window).width() > 960) {
                        jQuery(".product-image-feature").elevateZoom({
                            gallery: 'sliderproduct',
                            scrollZoom: true
                        });
                    } else {
                    }
                    jQuery('.slide-next').click(function() {
                        if ($(".product-thumb.active").prev().length > 0) {
                            $(".product-thumb.active").prev().find('img').click();
                        } else {
                            $(".product-thumb:last img").click();
                        }
                    });
                    jQuery('.slide-prev').click(function() {
                        if ($(".product-thumb.active").next().length > 0) {
                            $(".product-thumb.active").next().find('img').click();
                        } else {
                            $(".product-thumb:first img").click();
                        }
                    });
                });
            </script>

        </div>
    </section>
@endsection
