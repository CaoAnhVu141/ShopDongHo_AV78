@extends('layout.master_shopping')

@section('content')
    <section id="content" class="clearfix container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- Content-->
                <div class="main-content">
                    <!-- Sản phẩm trang chủ -->
                    <div class="product-list clearfix">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <aside class="styled_header  use_icon ">
                                    <h2>What hot</h2>
                                    <h3>Toàn bộ sản phẩm</h3>
                                    <span class="icon"><img
                                            src="./theme.hstatic.net/1000177652/1000229231/14/icon_featured.png?v=90"
                                            alt=""></span>

                                </aside>
                            </div>
                        </div>
                        <!--Product loop-->
                        <div class="row content-product-list products-resize">

							@foreach ($products as $item)
							<div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                <div class="product-block product-resize">
                                    <div class="product-img image-resize view view-third">
                                        <div class="product-sale">
                                            <span><label class="sale-lb">- </label>{{ $item->discount }} %</span>
                                        </div>
                                        <a href="{{ route('detailproduct',['id' =>$item->id_product]) }}"
                                            title="{{ $item->name }}">
                                            <img class="first-image  has-img" alt="{{ $item->name }}"
                                                src="{{ asset($item->image) }}" height="400px" width="400px" />
                                            <img class ="second-image"
                                                src="{{ asset($item->image) }}"
                                                alt="{{ $item->image }}" height="400px" width="400px"/>
                                        </a>
                                        <div class="actionss">
                                            <div class="btn-cart-products">
                                                <a href="xemgiohang.html">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="view-details">
                                                <a href="chitietsanpham.html" class="view-detail">
                                                    <span><i class="fa fa-clone"> </i></span>
                                                </a>
                                            </div>
                                            <div class="btn-quickview-products">
                                                <a href="javascript:void(0);" class="quickview"
                                                    data-handle="{{ route('detailproduct',['id' =>$item->id_product]) }}"><i
                                                        class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <!-- sử dụng pull-left -->
                                        <h3 class="pro-name"><a href="{{ route('detailproduct',['id' =>$item->id_product]) }}"
                                                title="{{ $item->name }}">{{ $item->name }}</a></h3>
                                        <div class="pro-prices">
                                            <p class="pro-price">{{ $item->price }}</p>
                                            <p class="pro-price-del text-left"><del class="compare-price">{{ $item->price }}</del></p>
                                        </div>
                                    </div>
                                </div> 
                            </div>
							@endforeach

                            </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12  pull-center center">
                                <a class="btn btn-readmore" href="" role="button">Xem
                                    thêm</a>


                            </div>
                        </div>
                    </div>
                    <!--Product loop-->
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="animation fade-in home-banner-1">
                                <aside class="banner-home-1">

                                    <div class="divcontent"><span class="ad_banner_1">Miễn phí vận
                                            chuyển<strong class="ad_banner_2">Với tất cả đơn hàng trên 500k
                                                thành phố Hà Nội</strong></span>
                                        <span class="ad_banner_desc">Miễn phí 2 ngày vận chuyển với đơn hàng
                                            trên 500k trừ trực tiếp khi thanh toán</span>
                                    </div>
                                    <!-- <div class="divstyle" style="border-color"></div> -->
                                </aside>
                            </div>
                        </div>
                    </div>

                    <div class="product-list clearfix ">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <aside class="styled_header  use_icon ">
                                    <h3>Sản phẩm hot</h3>
                                    {{-- <span class="icon"><img
                                            src="./theme.hstatic.net/1000177652/1000229231/14/icon_sale.png?v=90"
                                            alt="Newest trends"></span> --}}
                                </aside>
                            </div>
                        </div>
                        <div class="row content-product-list products-resize">
							@foreach ($products as $item)
							@if ($item->checkstatus == 1)
							<div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                <div class="product-block product-resize">
                                    <div class="product-img image-resize view view-third">
                                        <div class="product-sale">
                                            <span><label class="sale-lb">- </label>{{ $item->discount }} %</span>
                                        </div>
                                        <a href="{{ route('detailproduct',['id' =>$item->id_product]) }}"
                                            title="{{ $item->name }}">
                                            <img class="first-image  has-img" alt="{{ $item->name }}"
                                                src="{{ asset($item->image) }}" />
                                            <img class ="second-image"
                                                src="{{ asset($item->image) }}"
                                                alt="{{ $item->name }}" />
                                        </a>
                                        <div class="actionss">
                                            <div class="btn-cart-products">
                                                <a href="javascript:void(0);"
                                                    onclick="add_item_show_modalCart(1012006226)">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="view-details">
                                                <a href="/products/dong-ho-nam-skmei-co-lich-mo-rong" class="view-detail">
                                                    <span><i class="fa fa-clone"> </i></span>
                                                </a>
                                            </div>
                                            <div class="btn-quickview-products">
                                                <a href="javascript:void(0);" class="quickview"
                                                    data-handle="/products/dong-ho-nam-skmei-co-lich-mo-rong"><i
                                                        class="fa fa-eye"></i></a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="product-detail clearfix">
                                        <!-- sử dụng pull-left -->
                                        <h3 class="pro-name"><a href="/products/dong-ho-nam-skmei-co-lich-mo-rong"
                                                title="ĐỒNG HỒ NAM SKMEI CÓ LỊCH MỎ RỘNG">{{ $item->name }}</a></h3>
                                        <div class="pro-prices">
                                            <p class="pro-price">{{ $item->price }}</p>
                                            <p class="pro-price-del text-left"><del class="compare-price">{{ $item->price }}</del>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
							@endif
							
							@endforeach
                            
                        <div class="row">
                            <div class="col-lg-12 pull-center center ">
                                <a class="btn btn-readmore" href="/collections/dong-ho-cao-cap" role="button">Xem
                                    thêm</a>
                            </div>
                        </div>
                    </div>

					{{-- <div class="product-list clearfix ">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <aside class="styled_header  use_icon ">
                                    <h3>Sản phẩm hot</h3>
                                    <span class="icon"><img
                                            src="./theme.hstatic.net/1000177652/1000229231/14/icon_sale.png?v=90"
                                            alt="Newest trends"></span>
                                </aside>
                            </div>
                        </div>
                        <div class="row content-product-list products-resize">
                            <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                <div class="product-block product-resize">
                                    <div class="product-img image-resize view view-third">

                                        <div class="product-sale">
                                            <span><label class="sale-lb">- </label> 50%</span>
                                        </div>
                                        <a href="/products/dong-ho-nam-skmei-co-lich-mo-rong"
                                            title="ĐỒNG HỒ NAM SKMEI CÓ LỊCH MỎ RỘNG">
                                            <img class="first-image  has-img" alt=" ĐỒNG HỒ NAM SKMEI CÓ LỊCH MỎ RỘNG "
                                                src="./product.hstatic.net/1000177652/product/1_8dc682692fec4967843d81915f827888_large.jpg" />
                                            <img class ="second-image"
                                                src="./product.hstatic.net/1000177652/product/2_38d65a0a0c1a483cbeb02046b329a2ed_large.jpg"
                                                alt=" ĐỒNG HỒ NAM SKMEI CÓ LỊCH MỎ RỘNG " />
                                        </a>
                                        <div class="actionss">
                                            <div class="btn-cart-products">
                                                <a href="javascript:void(0);"
                                                    onclick="add_item_show_modalCart(1012006226)">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="view-details">
                                                <a href="/products/dong-ho-nam-skmei-co-lich-mo-rong" class="view-detail">
                                                    <span><i class="fa fa-clone"> </i></span>
                                                </a>
                                            </div>
                                            <div class="btn-quickview-products">
                                                <a href="javascript:void(0);" class="quickview"
                                                    data-handle="/products/dong-ho-nam-skmei-co-lich-mo-rong"><i
                                                        class="fa fa-eye"></i></a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="product-detail clearfix">
                                        <!-- sử dụng pull-left -->
                                        <h3 class="pro-name"><a href="/products/dong-ho-nam-skmei-co-lich-mo-rong"
                                                title="ĐỒNG HỒ NAM SKMEI CÓ LỊCH MỎ RỘNG">ĐỒNG HỒ NAM SKMEI CÓ
                                                LỊCH MỎ RỘNG </a></h3>
                                        <div class="pro-prices">
                                            <p class="pro-price">350,000₫</p>
                                            <p class="pro-price-del text-left"><del class="compare-price">700,000₫</del>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-12 pull-center center ">
                                <a class="btn btn-readmore" href="/collections/dong-ho-cao-cap" role="button">Xem
                                    thêm</a>
                            </div>
                        </div>
                    </div> --}}

                    <div class="banner-bottom">
                        <div class="row">

                            {{-- <div class="col-xs-12 col-sm-6 home-category-item-2">
                                <div class="block-home-category">
                                    <a href="http://happylive.vn/collections/dong-ho-nam">
                                        <img class="b-lazy b-loaded"
                                            src="./theme.hstatic.net/1000177652/1000229231/14/block_home_category1.jpg?v=90"
                                            alt="nam">
                                    </a>
                                </div>
                            </div> --}}
                            {{-- <div class="col-xs-12 col-sm-6 home-category-item-3">
                                <div class="block-home-category">
                                    <a href="http://happylive.vn/collections/dong-ho-nu">
                                        <img class="b-lazy b-loaded"
                                            src="./theme.hstatic.net/1000177652/1000229231/14/block_home_category2.jpg?v=90"
                                            alt="nữ">
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- end Content-->
            </div>
        </div>
    </section>
@endsection
