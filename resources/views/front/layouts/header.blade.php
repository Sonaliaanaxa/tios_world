<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <!--navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('home')}}">
      <img src="{{asset('assets/img/tios.png')}}" alt="logo">
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mainmenu" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto">
        <li class="nav-item dropdown-toggle"><a class="nav-link" href="#">Shop</a>
          <ul>
          @php
            $categories = App\Category::get();
            @endphp
            @foreach($categories as $category)
              <li><a href="#">{{$category->name}}</a>
              @php
              $category_id = $category->id;
              $subcategories = App\Models\Subcategory::where('category_id',$category_id)->get();
              @endphp
             
                  <ul>
                  @foreach($subcategories as $subcategory)
                      <li>
                        <a href="#">{{$subcategory->name}}</a>
                      @php
                      $subcategory_id = $subcategory->id;
                      $products = App\Product::where('subcategory_id',$subcategory_id)->get();
                      @endphp
                     
                        <ul>
                        @foreach($products as $product)
                        <li><a href="{{route('shop',$product->slug)}}">{{$product->name}}</a></li>
                        @endforeach
                        </ul>
                     
                    </li>
                    @endforeach
                  </ul>
                 
              </li>
              @endforeach
          </ul>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{route('sample-page')}}">Try first</a>
        </li>
        <li class="nav-item dropdown-toggle"><a class="nav-link" href="#">Collections</a>

          <ul>
          @php
            $collections = App\Models\Collection::where('status','1')->get();
            @endphp
            @foreach($collections as $collection)
              <li><a href="{{route('collections',$collection->slug)}}">{{$collection->name}}</a></li>
              @endforeach
          </ul>

      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{route('brand')}}">Brands</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about')}}">About Us</a>
        </li>
      </ul>
      <div class="nav-r form-inline my-2 my-lg-0" id="mobile-search">
        <div class="collections-btn">
          <a href="#" class="common-btn">5  tios points</a>
        </div>
        <ul>
          <li>
            <a href="#" class="search-toggle">
              <img src="./assets/img/search.png" class=" search-icon icon-search" alt="">
              <div class="search-box-wrap">
                <div class="searchform" role="search">
                  <form>
                    <input type="text" name="q" id="search-terms" placeholder="Search..." class="search-field">
                    <input type="submit" class="search-submit default-btn" value="submit">
                  </form>
                </div>
              </div>
            </a>
          </li>
          <li><a href="login.html"><img src="./assets/img/Icon.png" alt=""></a></li>
          <li><a href="view-cart.html"><img src="./assets/img/cart.png" alt=""></a></li>
        </ul>
      </div>
	   </div>
    </nav>
  <!--navbar end-->
  