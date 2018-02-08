<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      @if(Request::is('admin/dashboard'))
        <li class="active">
          <a href="{{ route('admin.dashboard') }}" class="active">
            <i class="fa fa-dashboard"></i> <span>{!! trans('admin.dashboard') !!}</span>
          </a>
        </li>
      @else
        <li>
          <a href="{{ route('admin.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>{!! trans('admin.dashboard') !!}</span>
          </a>
        </li>
      @endif
      
      @if(in_array('manage_pages', $user_permission_list))
        @if(Request::is('admin/pages/list') || Request::is('admin/page/add') || Request::is('admin/page/update/*'))
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-file"></i> <span>{!! trans('admin.page_menu_title') !!}</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @if(Request::is('admin/pages/list'))
                <li class="active"><a href="{{ route('admin.all_pages') }}"><i class="fa fa-table"></i> {!! trans('admin.all_pages_list') !!}</a></li>
              @else
                <li><a href="{{ route('admin.all_pages') }}"><i class="fa fa-table"></i> {!! trans('admin.all_pages_list') !!}</a></li>
              @endif

              @if(in_array('add_edit_delete_pages', $user_permission_list))
                @if(Request::is('admin/page/add') || Request::is('admin/page/update/*'))
                  <li class="active"><a href="{{route('admin.add_page')}}"><i class="fa fa-plus-square-o"></i> {!! trans('admin.add_new_page') !!}</a></li>
                @else
                  <li><a href="{{route('admin.add_page')}}"><i class="fa fa-plus-square-o"></i> {!! trans('admin.add_new_page') !!}</a></li>
                @endif
              @endif
            </ul>
          </li>
        @else
          <li class="treeview">
            <a href="#">
              <i class="fa fa-file"></i> <span>{!! trans('admin.page_menu_title') !!}</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.all_pages') }}"><i class="fa fa-table"></i> {!! trans('admin.all_pages_list') !!}</a></li>

              @if(in_array('add_edit_delete_pages', $user_permission_list))
                <li><a href="{{route('admin.add_page')}}"><i class="fa fa-plus-square-o"></i> {!! trans('admin.add_new_page') !!}</a></li>
              @endif
            </ul>
          </li>
        @endif
      @endif
      
  
      
     
        
      @if(in_array('manage_products', $user_permission_list))  
        @if(Request::is('admin/product/list') || Request::is('admin/product/add') || Request::is('admin/product/update/*') || Request::is('admin/product/categories/list') || Request::is('admin/product/tags/list') || Request::is('admin/product/attributes/list') || Request::is('admin/product/colors/list') || Request::is('admin/product/sizes/list') || Request::is('admin/product/comments-list'))
         <li class="active treeview">
            <a href="#">
              <i class="fa fa-shopping-cart"></i> <span>{!! trans('admin.products') !!}</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              
              @if(in_array('all_products', $user_permission_list))  
                @if(Request::is('admin/product/list'))  
                  <li class="active"><a href="{{ route('admin.product_list') }}"><i class="fa fa-table"></i> {!! trans('admin.all_products') !!}</a></li>
                @else
                  <li><a href="{{ route('admin.product_list') }}"><i class="fa fa-table"></i> {!! trans('admin.all_products') !!}</a></li>
                @endif
              @endif
              
              @if(in_array('add_edit_product', $user_permission_list)) 
                @if(Request::is('admin/product/add') || Request::is('admin/product/update/*'))
                  <li class="active"><a href="{{route('admin.add_product')}}"><i class="fa fa-plus-square-o"></i> {!! trans('admin.add_product') !!}</a></li>
                @else
                  <li><a href="{{route('admin.add_product')}}"><i class="fa fa-plus-square-o"></i> {!! trans('admin.add_product') !!}</a></li>
                @endif
              @endif
              
           
            
              
          
              
              @if(in_array('product_colors', $user_permission_list))
                @if(Request::is('admin/product/colors/list') || Request::is('admin/product/colors/add') || Request::is('admin/product/colors/update/*'))
                  <li class="active"><a href="{{route('admin.product_colors_list')}}"><i class="fa fa-paint-brush"></i> {!! trans('admin.colors_label') !!}</a></li>
                @else
                  <li><a href="{{route('admin.product_colors_list')}}"><i class="fa fa-paint-brush"></i> {!! trans('admin.colors_label') !!}</a></li>
                @endif
              @endif
              
              
              
              @if(in_array('manage_products_comments', $user_permission_list))
                @if(Request::is('admin/product/comments-list'))
                  <li class="active"><a href="{{route('admin.all_products_comments')}}"><i class="fa fa-comment"></i> {!! trans('admin.blog_comments_list') !!}</a></li>  
                @else
                  <li><a href="{{route('admin.all_products_comments')}}"><i class="fa fa-comment"></i> {!! trans('admin.blog_comments_list') !!}</a></li>  
                @endif
              @endif
            </ul>
        </li>
        @else
          <li class="treeview">
            <a href="#">
              <i class="fa fa-shopping-cart"></i> <span>{!! trans('admin.products') !!}</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @if(in_array('all_products', $user_permission_list))  
                <li><a href="{{ route('admin.product_list') }}"><i class="fa fa-table"></i> {!! trans('admin.all_products') !!}</a></li>
              @endif
              
              @if(in_array('add_edit_product', $user_permission_list)) 
                <li><a href="{{ route('admin.add_product') }}"><i class="fa fa-plus-square-o"></i> {!! trans('admin.add_product') !!}</a></li>
              @endif
              
              @if(in_array('product_categories', $user_permission_list))
                <li><a href="{{ route('admin.product_categories_list') }}"><i class="fa fa-camera"></i> {!! trans('admin.categories') !!}</a></li>
              @endif
              
              @if(in_array('product_tags', $user_permission_list))
                <li><a href="{{ route('admin.product_tags_list') }}"><i class="fa fa-tags"></i> {!! trans('admin.tags') !!}</a></li>
              @endif
              
              @if(in_array('product_attributes', $user_permission_list))
                <li><a href="{{ route('admin.product_attributes_list') }}"><i class="fa fa-th-large"></i> {!! trans('admin.attributes') !!}</a></li>
              @endif
              
              @if(in_array('product_colors', $user_permission_list))
                <li><a href="{{ route('admin.product_colors_list') }}"><i class="fa fa-paint-brush"></i> {!! trans('admin.colors_label') !!}</a></li>
              @endif
              
              @if(in_array('product_sizes', $user_permission_list))
                <li><a href="{{ route('admin.product_sizes_list') }}"><i class="fa fa-th-large"></i> {!! trans('admin.sizes_label') !!}</a></li>
              @endif
              
              @if(in_array('manage_products_comments', $user_permission_list))
                <li><a href="{{ route('admin.all_products_comments') }}"><i class="fa fa-comment"></i> {!! trans('admin.blog_comments_list') !!}</a></li>  
              @endif
            </ul>
          </li>
        @endif
      @endif  

     
    
        
     
     
      @if(in_array('manage_seo', $user_permission_list))
        @if(Request::is('admin/manage/seo'))
          <li class="active">
            <a href="{{ route('admin.manage_seo_content') }}" class="active">
              <i class="fa fa-search-plus"></i> <span>{!! trans('admin.seo_label') !!}</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('admin.manage_seo_content') }}">
              <i class="fa fa-search-plus"></i> <span>{!! trans('admin.seo_label') !!}</span>
            </a>
          </li>
        @endif
      @endif  
        
      @if(in_array('manage_requested_product', $user_permission_list))
        @if(Request::is('admin/customer/request-product'))
          <li class="active">
            <a href="{{ route('admin.request_product_content') }}" class="active">
              <i class="fa fa-question-circle-o"></i> <span>{!! trans('admin.request_product_label') !!}</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('admin.request_product_content') }}">
              <i class="fa fa-question-circle-o"></i> <span>{!! trans('admin.request_product_label') !!}</span>
            </a>
          </li>
        @endif
      @endif  
       
    
						
      @if(in_array('manage_extra_features', $user_permission_list))
        @if(Request::is('admin/extra-features/product-compare-fields') || Request::is('admin/extra-features/color-filter'))			
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>{!! trans('admin.more_features_label') !!}</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            @if(Request::is('admin/extra-features/product-compare-fields'))
              <li class="active"><a href="{{ route('admin.extra_features_compare_products_content') }}"><i class="fa fa-exchange"></i> {!! trans('admin.more_features_compare_products_label') !!}</a></li>
            @else
              <li><a href="{{ route('admin.extra_features_compare_products_content') }}"><i class="fa fa-exchange"></i> {!! trans('admin.more_features_compare_products_label') !!}</a></li>
            @endif
          </ul>
        </li>
        @else
          <li class="treeview">
            <a href="#">
              <i class="fa fa-plus"></i> <span>{!! trans('admin.more_features_label') !!}</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.extra_features_compare_products_content') }}"><i class="fa fa-exchange"></i> {!! trans('admin.more_features_compare_products_label') !!}</a></li>
            </ul>
          </li>
        @endif
      @endif  

      @if(in_array('manage_settings', $user_permission_list))
        @if(Request::is('admin/settings/general') || Request::is('admin/settings/languages') || Request::is('admin/settings/languages/update/*') || Request::is('admin/settings/appearance'))
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-cog"></i> <span>{!! trans('admin.settings') !!}</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @if(Request::is('admin/settings/general'))  
                <li class="active"><a href="{{ route('admin.general_settings_content') }}"><i class="fa fa-circle-o"></i> {!! trans('admin.general') !!}</a></li>
              @else
                 <li><a href="{{ route('admin.general_settings_content') }}"><i class="fa fa-circle-o"></i> {!! trans('admin.general') !!}</a></li>
              @endif

            
           
            </ul>
          </li>
        @else
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cog"></i> <span>{!! trans('admin.settings') !!}</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.general_settings_content') }}"><i class="fa fa-circle-o"></i> {!! trans('admin.general') !!}</a></li>
             
            </ul>
          </li>
        @endif
      @endif  
    </ul>
  </section>
</aside>