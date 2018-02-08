<section class="breadcrumbs">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="{{ route('home-page') }}"><i class="fa fa-home"></i></a></li>
      <li>{{ trans('frontend.products') }}</li>
    </ul>
  </div>
</section>

<div id="products" class="pageContent">
  <section class="content">
    <div class="container">
      <div class="row">
        <div id="productLeftColumn" class="col-md-3">
          <div class="left-column-content">
            <div class="product-categories-list">
              @include('includes.frontend.categories')
              @yield('categories-content')
            </div>

            <div class="filter-panel">
              <div class="filter-option-title">{{ trans('frontend.filter_options_label') }}</div>
              <form action="{{ $all_products_details['action_url'] }}" method="get">
                <div class="price-filter">
                  <h2>{{ trans('frontend.price_range_label') }} <span class="responsive-accordian"></span></h2>
                  <div class="price-slider-option">
                    <input type="text" class="span2" value="" data-slider-min="{{ get_appearance_settings()['general']['filter_price_min'] }}" data-slider-max="{{ get_appearance_settings()['general']['filter_price_max'] }}" data-slider-step="5" data-slider-value="[{{ $all_products_details['min_price'] }},{{ $all_products_details['max_price'] }}]" id="price_range" ><br />
                    <b>{{get_current_currency_symbol(). get_appearance_settings()['general']['filter_price_min'] }}</b> <b class="pull-right">{{ get_current_currency_symbol(). get_appearance_settings()['general']['filter_price_max'] }}</b>

                    <input name="price_min" id="price_min" value="{{ $all_products_details['min_price'] }}" type="hidden">
                    <input name="price_max" id="price_max" value="{{ $all_products_details['max_price'] }}" type="hidden">
                  </div>
                </div>  
                  
                @if(count($colors_list_data) > 0)
                <div class="colors-filter">
                  <h2>{{ trans('frontend.choose_color_label') }} <span class="responsive-accordian"></span></h2>
                  <div class="colors-filter-option">
                    @foreach($colors_list_data as $terms)
                    <div class="colors-filter-elements">
                      <div class="chk-filter">
                        @if(count($all_products_details['selected_colors']) > 0 && in_array($terms['slug'], $all_products_details['selected_colors']))  
                        <input type="checkbox" checked class="shopist-iCheck chk-colors-filter" value="{{ $terms['slug'] }}">
                        @else
                        <input type="checkbox" class="shopist-iCheck chk-colors-filter" value="{{ $terms['slug'] }}">
                        @endif
                      </div>
                      <div class="filter-terms">
                        <div class="filter-terms-appearance"><span style="background-color:#{{ $terms['color_code'] }};width:21px;height:20px;display:block;"></span></div>
                        <div class="filter-terms-name">&nbsp; {!! $terms['name'] !!}</div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @if($all_products_details['selected_colors_hf'])
                  <input name="selected_colors" id="selected_colors" value="{{ $all_products_details['selected_colors_hf'] }}" type="hidden">
                  @endif
                </div>
                @endif
                
                @if(count($sizes_list_data) > 0)
                <div class="size-filter">
                  <h2>{{ trans('frontend.choose_size_label') }} <span class="responsive-accordian"></span></h2>
                  <div class="size-filter-option">
                    @foreach($sizes_list_data as $terms)
                    <div class="size-filter-elements">
                      <div class="chk-filter">
                        @if(count($all_products_details['selected_sizes']) > 0 && in_array($terms['slug'], $all_products_details['selected_sizes']))  
                        <input type="checkbox" checked class="shopist-iCheck chk-size-filter" value="{{ $terms['slug'] }}">
                        @else
                        <input type="checkbox" class="shopist-iCheck chk-size-filter" value="{{ $terms['slug'] }}">
                        @endif
                      </div>
                      <div class="filter-terms">
                        <div class="filter-terms-name">{!! $terms['name'] !!}</div>
                      </div>
                    </div>
                    @endforeach
                  </div> 
                  @if($all_products_details['selected_sizes_hf'])
                  <input name="selected_sizes" id="selected_sizes" value="{{ $all_products_details['selected_sizes_hf'] }}" type="hidden">
                  @endif
                </div>
                @endif
                
                <div class="btn-filter clearfix">
                  <button class="btn btn-sm" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> {{ trans('frontend.filter_label') }}</button>
                  <a class="btn btn-sm" href="{{ route('shop-page') }}"><i class="fa fa-close" aria-hidden="true"></i> {{ trans('frontend.clear_filter_label') }}</a>  
                </div>
              </form>
            </div>
          </div>
        </div>

        <div id="productRightColumn" class="col-md-3 col-md-push-6">
          <div class="right-column-content">
            @if(count($popular_tags_list) > 0)
            <div class="tags-product-list">
              <h2>{{ trans('frontend.popular_tags_label') }} <span class="responsive-accordian"></span></h2>
              <div class="tag-list">
                <ul>
                  @foreach($popular_tags_list as $tags)
                    <li><a href="{{ route('tag-single-page', $tags['slug']) }}"><i class="fa fa-angle-right"></i> {{ ucfirst($tags['name']) }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            @endif
            
            <div class="brands-list">
              <h2>{{ trans('frontend.our_brand_label') }} <span class="responsive-accordian"></span></h2>
              @if(count($brands_data) > 0)
                <?php $numb = 1; ?>
                <div id="brand-slider-carousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    @foreach($brands_data as $brand_name)
                      @if($numb == 1)
                        <div class="item active">
                          <div class="col-md-12">
                            <div class="text-center">
                              @if($brand_name['brand_logo_img_url'])
                              <a href="{{ route('brands-single-page', $brand_name['slug']) }}"><img src="{{ url('/').$brand_name['brand_logo_img_url'] }}"></a>
                              @else
                              <a href="{{ route('brands-single-page', $brand_name['slug']) }}"><img src="{{ default_placeholder_img_src() }}"></a>
                              @endif
                            </div>
                          </div>
                        </div>
                      @else
                        <div class="item">
                          <div class="col-md-12">
                            <div class="text-center">
                              @if($brand_name['brand_logo_img_url'])
                              <a href="{{ route('brands-single-page', $brand_name['slug']) }}"><img src="{{ url('/').$brand_name['brand_logo_img_url'] }}"></a>
                              @else
                              <a href="{{ route('brands-single-page', $brand_name['slug']) }}"><img src="{{ default_placeholder_img_src() }}"></a>
                              @endif
                            </div>
                          </div>
                        </div>
                      @endif
                      <?php $numb++ ; ?>
                    @endforeach
                  </div>
                  <div class="slider-control-main text-center">
                    <div class="prev-btn">
                      <a href="#brand-slider-carousel" class="control-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                      </a>
                    </div>

                    <div class="next-btn">
                      <a href="#brand-slider-carousel" class="control-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              @endif
            </div>
            
            <div class="best-seller">
              <h2>{{ trans('frontend.best_seller_label') }} <span class="responsive-accordian"></span></h2>
              @if(count($advancedData['best_sales']) > 0)
                <div id="product-page-best-seller" class="carousel slide" data-ride="carousel">
                  <?php $numb =1; $flag =1; $is_last_tag_added_for_best_seller = false;?>
                  <div class="carousel-inner">
                    @foreach($advancedData['best_sales'] as $key => $row)
                      @if($numb == 1)
                        @if($flag == 1)
                          <div class="item active">
                        @else
                          <div class="item">
                        @endif
                        <div class="product-content">
                          <div class="image-content">
                            @if(get_product_image($row['id']))
                            <img class="img-responsive" src="{{ get_product_image($row['id']) }}" alt="{{ basename(get_product_image($row['id'])) }}" />
                            @else
                            <img class="img-responsive" src="{{ default_placeholder_img_src() }}" alt="" />
                            @endif
                          </div>
                          <div class="product-details">
                            <p><a href="{{ route('details-page', $row['post_slug'])}}">{{ get_product_title($row['id']) }}</a></p>
                            @if(get_product_type($row['id']) == 'simple_product')
                              <p><strong>{!! price_html( get_product_price($row['id']), get_frontend_selected_currency() ) !!}</strong></p>
                            @elseif(get_product_type($row['id']) == 'configurable_product')
                              <p><strong>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $row['id']) !!}</strong></p>
                            @elseif(get_product_type($row['id']) == 'customizable_product' || get_product_type($row['id']) == 'downloadable_product')
                              @if(count(get_product_variations($row['id']))>0)
                                <p><strong>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $row['id']) !!}</strong></p>
                              @else
                                <p><strong>{!! price_html( get_product_price($row['id']), get_frontend_selected_currency() ) !!}</strong></p>
                              @endif
                            @endif
                          </div>
                        </div>
                        <?php $is_last_tag_added_for_best_seller = false;?>
                      @elseif($numb == 2)
                        <div class="product-content">
                          <div class="image-content">
                            @if(get_product_image($row['id']))
                            <img class="img-responsive" src="{{ get_product_image($row['id']) }}" alt="{{ basename(get_product_image($row['id'])) }}" />
                            @else
                            <img class="img-responsive" src="{{ default_placeholder_img_src() }}" alt="" />
                            @endif
                          </div>
                          <div class="product-details">
                            <p><a href="{{ route('details-page', $row['post_slug'])}}">{{ get_product_title($row['id']) }}</a></p>
                            @if(get_product_type($row['id']) == 'simple_product')
                              <p><strong>{!! price_html( get_product_price($row['id']), get_frontend_selected_currency() ) !!}</strong></p>
                            @elseif(get_product_type($row['id']) == 'configurable_product')
                              <p><strong>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $row['id']) !!}</strong></p>
                            @elseif(get_product_type($row['id']) == 'customizable_product' || get_product_type($row['id']) == 'downloadable_product')
                              @if(count(get_product_variations($row['id']))>0)
                                <p><strong>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $row['id']) !!}</strong></p>
                              @else
                                <p><strong>{!! price_html( get_product_price($row['id']), get_frontend_selected_currency() ) !!}</strong></p>
                              @endif
                            @endif
                          </div>
                        </div>
                        <?php $numb = 0; $is_last_tag_added_for_best_seller = true;?>
                        </div>
                      @else
                        <div class="product-content">
                          <div class="image-content">
                            @if(get_product_image($row['id']))
                            <img class="img-responsive" src="{{ get_product_image($row['id']) }}" alt="{{ basename(get_product_image($row['id'])) }}" />
                            @else
                            <img class="img-responsive" src="{{ default_placeholder_img_src() }}" alt="" />
                            @endif
                          </div>
                          <div class="product-details">
                            <p><a href="{{ route('details-page', $row['post_slug'])}}">{{ get_product_title($row['id']) }}</a></p>
                            @if(get_product_type($row['id']) == 'simple_product')
                              <p><strong>{!! price_html( get_product_price($row['id']), get_frontend_selected_currency() ) !!}</strong></p>
                            @elseif(get_product_type($row['id']) == 'configurable_product')
                              <p><strong>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $row['id']) !!}</strong></p>
                            @elseif(get_product_type($row['id']) == 'customizable_product' || get_product_type($row['id']) == 'downloadable_product')
                              @if(count(get_product_variations($row['id']))>0)
                                <p><strong>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $row['id']) !!}</strong></p>
                              @else
                                <p><strong>{!! price_html( get_product_price($row['id']), get_frontend_selected_currency() ) !!}</strong></p>
                              @endif
                            @endif
                          </div>
                        </div>
                        <?php $is_last_tag_added_for_best_seller = false;?>
                      @endif

                      <?php 
                       $numb++;
                       $flag++;
                      ?>
                    @endforeach

                    @if(!$is_last_tag_added_for_best_seller)
                       </div>
                    @endif 

                  </div>
                  <div class="slider-control-main text-center">
                    <div class="prev-btn">
                      <a href="#product-page-best-seller" class="control-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                      </a>
                    </div>

                    <div class="next-btn">
                      <a href="#product-page-best-seller" class="control-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              @else
                <p class="not-available">{!! trans('frontend.best_sales_products_empty_label') !!}</p>
              @endif
            </div>

            <div class="advertisement">
              <h2>{{ trans('frontend.advertisement_label') }} <span class="responsive-accordian"></span></h2>
              <div class="advertisement-content text-center">
                <img class="img-responsive" src="{{ asset('resources/assets/images/add-sample/shipping.jpg') }}" alt="">
              </div>
            </div>
          </div>
        </div>

        <div id="productMiddleColumn" class="col-md-6 col-md-pull-3">
          <div class="middle-column-content">
            <div class="advertisement-right">
              <div id="advertisement-right-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="item active">
                    <div class="text-center">
                      <a href=""><img src="{{ asset('resources/assets/images/add-sample/girl.jpg') }}" alt="" class="img-responsive" /></a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="text-center">
                      <a href=""><img src="{{ asset('resources/assets/images/add-sample/sunglass.png') }}" alt="" class="img-responsive" /></a>
                    </div>
                  </div> 
                  <div class="item">
                    <div class="text-center">
                      <a href=""><img src="{{ asset('resources/assets/images/add-sample/mobile.png') }}" alt="" class="img-responsive" /></a>
                    </div>
                  </div>
                </div>
                <div class="slider-control-main text-center">
                  <div class="prev-btn">
                    <a href="#advertisement-right-carousel" class="control-carousel" data-slide="prev">
                      <i class="fa fa-angle-left"></i>
                    </a>
                  </div>

                  <div class="next-btn">
                    <a href="#advertisement-right-carousel" class="control-carousel" data-slide="next">
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="products-list-top clearfix">
                <div class="col-xs-4 col-md-4">
                  <div class="product-views">
                    @if($all_products_details['selected_view'] == 'grid')
                      <a class="active" href="{{ $all_products_details['action_url_grid_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.grid_label') }}"><i class="fa fa-th"></i></a> 
                    @else  
                      <a href="{{ $all_products_details['action_url_grid_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.grid_label') }}"><i class="fa fa-th"></i></a> 
                    @endif

                    @if($all_products_details['selected_view'] == 'list')
                      <a class="active" href="{{ $all_products_details['action_url_list_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.list_label') }}"><i class="fa fa-th-list"></i></a>
                    @else  
                      <a href="{{ $all_products_details['action_url_list_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.list_label') }}"><i class="fa fa-th-list"></i></a>
                    @endif
                  </div>
                </div>
                  
                <div class="col-xs-8 col-md-8">
                  <div class="sort-filter-option">
                    <span>{{ trans('frontend.sort_filter_label') }} </span>  
                    <select class="form-control select2 sort-by-filter" style="width: 50%;">
                      @if($all_products_details['sort_by'] == 'all')  
                      <option selected="selected" value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
                      @else
                      <option value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
                      @endif

                      @if($all_products_details['sort_by'] == 'alpaz')  
                      <option selected="selected" value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
                      @else
                      <option value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
                      @endif

                      @if($all_products_details['sort_by'] == 'alpza')  
                      <option selected="selected" value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
                      @else
                      <option value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
                      @endif

                      @if($all_products_details['sort_by'] == 'low-high')  
                      <option selected="selected" value="low-high">{{ trans('frontend.sort_filter_low_high_label') }}</option>
                      @else
                      <option value="low-high">{{ trans('frontend.sort_filter_low_high_label') }}</option>
                      @endif

                      @if($all_products_details['sort_by'] == 'high-low')  
                      <option selected="selected" value="high-low">{{ trans('frontend.sort_filter_high_low_label') }}</option>
                      @else
                      <option value="high-low">{{ trans('frontend.sort_filter_high_low_label') }}</option>
                      @endif

                      @if($all_products_details['sort_by'] == 'old-new')  
                      <option selected="selected" value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
                      @else
                      <option value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
                      @endif

                      @if($all_products_details['sort_by'] == 'new-old')
                      <option selected="selected" value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
                      @else
                      <option value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
                      @endif
                    </select>
                  </div>
                </div>  
                </div>  
              </div>
            </div>
            
            <div class="row">
              <div class="products-list">
                @include('includes.frontend.products')
                @yield('products-content')
              </div>
            </div>      
          </div>
        </div>
      </div>
    </div>
  </section>
</div>