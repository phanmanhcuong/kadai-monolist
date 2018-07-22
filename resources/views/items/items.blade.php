@if ($items)
    <div class="row">
        @foreach ($items as $key => $item)
            <div class="item">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $item->image_url }}" alt="">
                        </div>
                        <div class="panel-body">
                            @if ($item->id)
                                <p class="item-title"><a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a></p>
                            @else
                                <p class="item-title"><a href="#">{{ $item->name }}</a></p>
                            @endif
                            <div class="buttons text-center">
                                @if (Auth::check())
                                    @include('items.want_button', ['item' => $item])
                                    @include('items.have_button', ['item' => $item])
                                @endif
                            </div>
                        </div>
                        
                        <div class="panel-footer">
                            @if (isset($item->count_want))
                                <p class="text-center">{{ $key+1 }}位: {{ $item->count_want }} Wants</p>
                            @endif
                                                    
                            @if (isset($item->count_have))
                                <p class="text-center">{{ $key+1 }}位: {{ $item->count_have }} Haves</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif