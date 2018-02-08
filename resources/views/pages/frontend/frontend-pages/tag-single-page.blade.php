@section('frontend-tag-single-page-content')
<br>
<div class="container new-container">
  <div id="tag_single_page_main">
    <div class="row">
      <div class="col-md-4 extra-padding">
        @if(count($popular_tags_list) > 0)
        <div class="tags-product-list">
          <h2>{{ trans('frontend.popular_tags_label') }} <span class="responsive-accordian"></span></h2>
          <div class="tag-list">
            <ul>
              @foreach($popular_tags_list as $tags)
                @if($tags['slug'] == $tag_single_details['tag_details']['slug'])
                  <li><a class="tag-active" href="{{ route('tag-single-page', $tags['slug']) }}"><i class="fa fa-angle-right"></i> {{ ucfirst($tags['name']) }}</a></li>
                @else
                  <li><a href="{{ route('tag-single-page', $tags['slug']) }}"><i class="fa fa-angle-right"></i> {{ ucfirst($tags['name']) }}</a></li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>
        @endif
      </div>
      <div class="col-md-8">
        @if($tag_single_details['products']->count() > 0)
          <div class="product-content clearfix">
            @foreach($tag_single_details['products'] as $products)
              <div class="col-xs-12 col-sm-6 col-md-6 extra-padding">
                <div class="hover-product">
                  <div class="hover">
                    @if(get_product_image($products->id))
                    <img class="img-responsive" src="{{ get_product_image($products->id) }}" alt="{{ basename(get_product_image($products->id)) }}" />
                    @else
                    <img class="img-responsive" src="{{ default_placeholder_img_src() }}" alt="" />
                    @endif

                    <div class="overlay">
                      <button class="info quick-view-popup" data-id="{{ $products->id }}">{{ trans('frontend.quick_view_label') }}</button>
                    </div>
                  </div> 

                  <div class="single-product-bottom-section">
                    <h3>{!! get_product_title($products->id) !!}</h3>

                    @if(get_product_type($products->id) == 'simple_product')
                      <p>{!! price_html( get_product_price($products->id), get_frontend_selected_currency() ) !!}</p>
                    @elseif(get_product_type($products->id) == 'configurable_product')
                      <p>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id) !!}</p>
                    @elseif(get_product_type($products->id) == 'customizable_product' || get_product_type($products->id) == 'downloadable_product')
                      @if(count(get_product_variations($products->id))>0)
                        <p>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id) !!}</p>
                      @else
                        <p>{!! price_html( get_product_price($products->id), get_frontend_selected_currency() ) !!}</p>
                      @endif
                    @endif

                    <div class="title-divider"></div>
                   
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="products-pagination">{!! $tag_single_details['products']->appends(Request::capture()->except('page'))->render() !!}</div>
        @else
        <br><p>{{ trans('frontend.no_product_for_tag_label') }}</p>
        @endif
      </div>
    </div>
  </div>
</div>    
@endsection