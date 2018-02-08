@section('categories-products-content')
  @if(count($product_by_cat_id['products'])>0)
    @if($product_by_cat_id['selected_view'] == 'grid')
      <div class="categories-products-content clearfix">
        @foreach($product_by_cat_id['products'] as $products)
        <div class="col-xs-12 col-sm-6 col-md-6 extra-padding">
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
              
              <div class="title-divider"></div>
            
            </div>
          </div>
        </div>
        @endforeach
      </div>
    @endif
    
    @if($product_by_cat_id['selected_view'] == 'list')
      <div class="row">
        @foreach($product_by_cat_id['products'] as $products)
          <div class="col-md-12">
            <div class="box effect list-view-box">
              <div class="col-md-5">
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
              <div class="col-md-7">
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
                
                <div class="title-divider"></div>
                <br>
              
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
    <div class="col-md-12">
      <div class="products-pagination">{!! $product_by_cat_id['products']->appends(Request::capture()->except('page'))->render() !!}</div>
    </div>
  @else
    <div class="col-md-12">
      <div class="alert-msg"><span>{{ trans('frontend.no_product_of_this_category') }}</span> </div>
    </div>
  @endif
@endsection