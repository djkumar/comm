@section('products-content')

@if($all_products_details['products']->count() > 0)
  @if($all_products_details['selected_view'] == 'grid')
    <div class="product-content clearfix">
      @foreach($all_products_details['products'] as $products)
        <?php 
        $reviews          = get_comments_rating_details($products['id'], 'product');
        $reviews_settings = get_reviews_settings_data($products['id']);      
        ?>
        <div class="col-xs-12 col-sm-4 col-md-6 extra-padding grid-view">
          <div class="hover-product">
            <div class="hover">
              @if(get_product_image($products['id']))
              <img class="img-responsive" src="{{ get_product_image($products['id']) }}" alt="{{ basename(get_product_image($products['id'])) }}" />
              @else
              <img class="img-responsive" src="{{ default_placeholder_img_src() }}" alt="" />
              @endif

              <div class="overlay">
                <button class="info quick-view-popup" data-id="{{ $products['id'] }}">{{ trans('frontend.quick_view_label') }}</button>
              </div>
            </div> 

            <div class="single-product-bottom-section">
              <h3>{!! get_product_title($products['id']) !!}</h3>

              @if(get_product_type($products['id']) == 'simple_product')
                <p>{!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}</p>
              @elseif(get_product_type($products['id']) == 'configurable_product')
                <p>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}</p>
              @elseif(get_product_type($products['id']) == 'customizable_product' || get_product_type($products['id']) == 'downloadable_product')
                @if(count(get_product_variations($products['id']))>0)
                  <p>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}</p>
                @else
                  <p>{!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}</p>
                @endif
              @endif
              
              @if($reviews_settings['enable_reviews_add_link_to_product_page'] && $reviews_settings['enable_reviews_add_link_to_product_page'] == 'yes')
                <div class="text-center">
                  <div class="star-rating">
                    <span style="width:{{ $reviews['percentage'] }}%"></span>
                  </div>

                  <div class="comments-advices">
                    <ul>
                      <li class="read-review"><a href="{{ route('details-page', $products['post_slug']) }}#product_description_bottom_tab" class="reviews selected"> {{ trans('frontend.single_product_read_review_label') }} (<span itemprop="reviewCount">{!! $reviews['total'] !!}</span>) </a></li>
                      <li class="write-review"><a class="open-comment-form" href="{{ route('details-page', $products['post_slug']) }}#new_comment_form">&nbsp;<span>|</span>&nbsp; {{ trans('frontend.single_product_write_review_label') }} </a></li>
                    </ul>
                  </div>
                </div>
              @endif
              
              <div class="title-divider"></div>
             
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
  
  @if($all_products_details['selected_view'] == 'list')
    <div class="row">
      @foreach($all_products_details['products'] as $products)
        <?php 
        $reviews          = get_comments_rating_details($products['id'], 'product');
        $reviews_settings = get_reviews_settings_data($products['id']);      
        ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="box effect list-view-box">
            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="list-view-image-container">
                @if(get_product_image($products['id']))
                  <img class="img-responsive" src="{{ get_product_image($products['id']) }}" alt="{{ basename(get_product_image($products['id'])) }}" />
                @else
                  <img class="img-responsive" src="{{ default_placeholder_img_src() }}" alt="" />
                @endif
                <div class="overlay">
                  <button class="info quick-view-popup" data-id="{{ $products['id'] }}">{{ trans('frontend.quick_view_label') }}</button>
                </div>
              </div>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7">
              <h3>{!! get_product_title($products['id']) !!}</h3>

              @if(get_product_type($products['id']) == 'simple_product')
                <p>{!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}</p>
              @elseif(get_product_type($products['id']) == 'configurable_product')
                <p>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}</p>
              @elseif(get_product_type($products['id']) == 'customizable_product' || get_product_type($products['id']) == 'downloadable_product')
                @if(count(get_product_variations($products['id']))>0)
                  <p>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}</p>
                @else
                  <p>{!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}</p>
                @endif
              @endif
              
               @if($reviews_settings['enable_reviews_add_link_to_product_page'] && $reviews_settings['enable_reviews_add_link_to_product_page'] == 'yes')
                <div class="list-view-reviews-main">
                  <div class="star-rating">
                    <span style="width:{{ $reviews['percentage'] }}%"></span>
                  </div>

                  <div class="comments-advices">
                    <ul>
                      <li class="read-review"><a href="{{ route('details-page', $products['post_slug']) }}#product_description_bottom_tab" class="reviews selected"> {{ trans('frontend.single_product_read_review_label') }} (<span itemprop="reviewCount">{!! $reviews['total'] !!}</span>) </a></li>
                      <li class="write-review"><a class="open-comment-form" href="{{ route('details-page', $products['post_slug']) }}#new_comment_form">&nbsp;<span>|</span>&nbsp; {{ trans('frontend.single_product_write_review_label') }} </a></li>
                    </ul>
                  </div>
                </div>
              @endif 
              
              <div class="title-divider"></div>

             
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
  <div class="products-pagination">{!! $all_products_details['products']->appends(Request::capture()->except('page'))->render() !!}</div>
@else
<p class="not-available">{!! trans('frontend.product_not_available') !!}</p>
@endif
@endsection