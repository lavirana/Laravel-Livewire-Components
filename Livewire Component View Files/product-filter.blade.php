<div>
    <div class="row gx-3">
        <div class="col-3 mt-4">
            <h4 class="text-gray-700 fw-bolder">FILTERS</h4>
            <div id="price_filter">
                <h5 class="text-gray-800 mt-4 fw-bolder">Price @if(count($filters['price']) > 0) <a wire:click="clearFilter('price')" class="fs-6 text-decoration-none cursor-pointer ms-1">Clear</a> @endif</h5> 
                    <div class="text-gray-700 text-uppercase">
                    <div class="form-check mt-2">
                        <input class="form-check-input" value="0,25" type="radio" name="pricefilter" id="under25" wire:model="filters.price">
                        <label class="form-check-label ps-2" for="under25">
                            Under $25
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" value="25,50" type="radio" name="pricefilter" id="25to50" wire:model="filters.price">
                        <label class="form-check-label ps-2" for="25to50">
                            $25 to $50
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" value="50,100" type="radio" name="pricefilter" id="50to100" wire:model="filters.price">
                        <label class="form-check-label ps-2" for="50to100">
                            $50 to $100
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" value="100,200" type="radio" name="pricefilter" id="100to200" wire:model="filters.price">
                        <label class="form-check-label ps-2" for="100to200">
                            $100 to $200
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" value="200" type="radio" name="pricefilter" id="200above" wire:model="filters.price">
                        <label class="form-check-label ps-2" for="200above">
                            $200 and Above
                        </label>
                    </div>
                </div>
            </div>
            <div id="headphones_type_filter">
                <h5 class="text-gray-800 mt-4 fw-bolder">Headphones Connection Type @if(count($filters['connectionType']) > 0) <a wire:click="clearFilter('connectionType')" class="fs-6 text-decoration-none cursor-pointer ms-1">Clear</a> @endif</h5>
                    <div class="text-gray-700 text-uppercase">
                        @foreach($filterOptions['connection_type'] as $connectionType)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$connectionType}}" id="{{$connectionType}}" wire:model="filters.connectionType">
                                <label class="form-check-label" for="{{$connectionType}}">
                                    {{$connectionType}}
                                </label>
                            </div>
                        @endforeach
                    </div>
            </div>
            <div id="review_filter">
                <h5 class="text-gray-800 mt-4 fw-bolder">Average Customer Review @if(count($filters['rating']) > 0) <a wire:click="clearFilter('rating')" class="fs-6 text-decoration-none cursor-pointer ms-1">Clear</a> @endif</h5>
                    <div class="text-gray-700 text-uppercase">
                        @foreach($filterOptions['ratings'] as $rating)
                        <div class="rating-4">
                            <input type="radio" class="btn-check" id="rating-{{$rating}}" value="{{$rating}},5" autocomplete="off" wire:model="filters.rating">
                            <label for="rating-{{$rating}}" class="cursor-pointer {{(in_array($rating, $filters['rating'])) ? 'fw-bold text-blue' : ''}}">
                                @for($i=0; $i<$rating; $i++)
                                    <i class="fas fa-star fa-sm text-info"></i>
                                @endfor
                                @for($i=5; $i>$rating; $i--)
                                    <i class="far fa-star fa-sm"></i> 
                                @endfor
                                <span class="ms-2">& up</span>
                            </label><br>
                        </div>
                        @endforeach
                    </div>
            </div>
            <div class="color_filter">
                <h5 class="text-gray-800 mt-4 mb-3 fw-bolder">Color @if(count($filters['colors']) > 0)<a wire:click="clearFilter('colors')" class="fs-6 text-decoration-none cursor-pointer ms-1">Clear</a>@endif</h5> 
                    <div class="d-flex flex-wrap">
                            @foreach($filterOptions['colors'] as $color)
                            <div class="{{$color}}-color me-2 mt-1">
                                <input type="checkbox" class="btn-check" id="color-{{$color}}" value="{{$color}}" autocomplete="off" wire:model="filters.colors">
                                <label for="color-{{$color}}">
                                    <div class="bg-{{$color}} text-center pt-1 rounded-circle shadow {{ (in_array($color, $filters['colors'])) ? 'border border-dark' : ''}}" style="width:30px; height:30px">{!! (in_array($color, $filters['colors'])) ? '<i class="fas fa-check text-white"></i>' : '' !!}</div>
                                </label><br>
                            </div>
                            @endforeach
                    </div>
            </div>
            <div id="headphones_type_filter">
                <h5 class="text-gray-800 mt-4 fw-bolder">Headphones Type @if(count($filters['type']) > 0)<a wire:click="clearFilter('type')" class="fs-6 text-decoration-none cursor-pointer ms-1">Clear</a>@endif</h5>
                    <div class="text-gray-700 text-uppercase">
                        @foreach($filterOptions['types'] as $type)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$type}}" id="{{$type}}" wire:model="filters.type">
                                <label class="form-check-label" for="{{$type}}">
                                    {{$type}}
                                </label>
                            </div>
                        @endforeach
                    </div>
            </div>
            <div id="brand_filter">
                <h5 class="text-gray-800 mt-4 fw-bolder">Brand @if(count($filters['brand']) > 0)<a wire:click="clearFilter('brand')" class="fs-6 text-decoration-none cursor-pointer ms-1">Clear</a>@endif</h5>
                    <div class="text-gray-700 text-uppercase">
                        @foreach($filterOptions['brands'] as $brand)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$brand}}" id="{{$brand}}" wire:model="filters.brand">
                            <label class="form-check-label" for="{{$brand}}">
                                {{$brand}}
                            </label>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
        <div class="col-9">
            <div class="row sort_pagination mb-5">
                <div class="col-4">

                </div>
                <div class="col-4">
                    <!-- Sort By -->
                    <select class="form-select" aria-label="Sort By" wire:model="orderSelect">
                        <option value='{"key":"created_at","direction":"desc"}' selected>Sort By</option>
                        <option value='{"key":"meta->rating","direction":"desc"}'>Best Rating</option>
                        <option value='{"key":"price","direction":"asc"}'>Low to High Price</option>
                        <option value='{"key":"price","direction":"desc"}'>High to Low Price</option>
                    </select>
                    <!-- Pagination -->
                </div>
                <div class="col-4">
                {{ $products->links() }}
                </div>
            </div>
            <div class="row">
                <div wire:loading.delay>
                <div class="d-flex justify-content-center">
                <div class="spinner-grow text-primary me-2" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-warning me-2" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-success me-2" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-lg-2 g-2 g-lg-2" wire:loading.remove>
                @forelse($products as $product)
                    <div class="col">
                        <div class="card text-center border-0 bg-transparent fw-bold text-gray-700" style="width: 14rem;">
                            <div class="p-4 border-0 shadow bg-white rounded">
                                <a href="{{$product->link}}" target="_blank"><img class="card-img-top" height="250px" src="{{$product->getFirstMediaUrl('images')}}" alt="Card image cap"></a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fs-5 pt-2">{{$product->title}}</h5>
                                <p class="card-text">${{$product->price}}</p>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="col"></div>
                <div class="col text-danger">
                    Sorry, No products found for the selected filters.
                </div>
                @endforelse              
            </div>
        </div>
    </div>
</div>
<style>
.card{
    font-family: 'Roboto', sans-serif;
}

img {
  transition: transform .5s ease;
}

img:hover{
    transform: scale(1.1);
}
</style>
