<div class="col-4">
    <h5 class="text-gray-800 mt-4 mb-3 fw-bolder">Color @if(count($colors) > 0)<a wire:click="clearColors" class="fs-6 ms-2 cursor-pointer">clear</a>@endif</h5> 
    <div class="d-flex flex-wrap">
            @foreach($colorOptions as $color)
            <div class="{{$color}}-color me-2">
                <input type="checkbox" class="btn-check" id="color-{{$color}}" value="{{$color}}" autocomplete="off" wire:model="colors">
                <label for="color-{{$color}}">
                    <div class="bg-{{$color}} text-center pt-1 rounded-circle shadow {{ (in_array($color, $colors)) ? 'border border-dark' : ''}}" style="width:30px; height:30px">{!! (in_array($color, $colors)) ? '<i class="fas fa-check text-white"></i>' : '' !!}</div>
                </label><br>
            </div>
            @endforeach
    </div>
    <div class="mt-5">You Chose {{implode(', ', $colors)}}</div>
</div>
