<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="container-fluid">
            {{--Start--}}
            <div class="{{!$isShowBlock_1  ? "show row" : "hide row"}}">
                <div class="col-md-12 .d-flex wd-500">
                    <h3 class="col text-center">
                        The Competition
                    </h3>
                    <div class="col text-center p-3">
                        <button wire:click="startGame()" type="button" class="btn btn-success">Start</button>
                    </div>
                </div>
            </div>

            {{--The suitors to the princess's hand!--}}
            <div class="{{$isShowBlock_1  ? "show" : "hide"}}">
                <h4 class="col text-center">The suitors to the princess's hand!</h4>
                <div class="row p-3">
                    @if(!empty($knights))
                        @foreach ($knights as $key=>$knight)
                            <div class="col-md-4 knights p-3 pb-5">
                                <img src="{{ $knight['picture'] }}" class="rounded" alt="Knight" width="100" height="100">
                                <h5>{{ $knight['name'] }}</h5>
                                <div class="dropdown-divider"></div>
                                <span>Age: {{ $knight['age'] }}</span>
                                <span>Strength: {{ $knight['strength'] }}</span>
                                <span>Defense: {{ $knight['defense'] }}</span>
                                <span>Battle strategy: {{ $knight['battle_strategy'] }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if(!empty($successEmail))
                <blockquote class="blockquote">
                    <p class="mb-0">
                        Dear princess! We have sent you an email describing the semi-finalists. Please check your E-mail.
                    </p>
                </blockquote>
                @endif
            </div>
        </div>
    </div>
</div>
