<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Competition</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('/view/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/view/css/style.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body>

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="container-fluid">
            {{--The battle between the finalists!--}}
            <div>
                <h4 class="p-3 col text-center">The battle between the finalists!</h4>
                @isset($finalists)
                <div class="row p-3">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach ($finalists as $finalist)
                            <div class="col-md-6 knights p-3 pb-5">
                                <img src="{{ $finalist->picture }}" class="rounded" alt="Knight" width="100" height="100">
                                <h5>{{ $finalist->name }}</h5>
                                <div class="dropdown-divider"></div>
                                <span>Age: {{ $finalist->age }}</span>
                                <span>Strength: {{ $finalist->strength }}</span>
                                <span>Defense: {{ $finalist->defense }}</span>
                                <span>Battle: {{ $finalist->battle_strategy }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-12">
                        <table class="table table-bordered table-sm">
                            <colgroup>
                                <col class="bg-primary w-5"></col>
                                <col class="bg-info w-50"></col>
                                <col class="bg-warning w-40"></col>
                                <col class="bg-danger w-5"></col>
                            </colgroup>
                            <thead>
                            <tr>
                                <th>Attack<br>#</th>
                                <th>What happened</th>
                                <th>The damage done</th>
                                <th>Defender’s<br>Health left</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($arAttacks as $attack)
                                <tr>
                                    <td>{{ $attack['attack_number'] }}</td>
                                    <td>{{ $attack['what_happened'] }}</td>
                                    <td>{{ $attack['the_damage_done'] }}</td>
                                    <td>{{ $attack['defenders_health_left'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endisset
            </div>

            {{--Battle Winner!--}}
            <div>
                <h4 class="col text-center">Battle Winner!</h4>
                <div class="row p-3">
                    @isset($winner)
                    <div class="col-md-12 knights p-3 pb-5">
                        <img src="{{ $winner['picture'] }}" class="rounded" alt="Knight" width="100" height="100">
                        <h5>{{ $winner['name'] }}</h5>
                        <div class="dropdown-divider"></div>
                        <span>Age: {{ $winner['age'] }}</span>
                        <span>Strength: {{ $winner['strength'] }}</span>
                        <span>Defense: {{ $winner['defense'] }}</span>
                        <span>Battle: {{ $winner['battle_strategy'] }}</span>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('/view/js/jquery.min.js') }}"></script>
<script src="{{ asset('/view/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/view/js/scripts.js') }}"></script>

@livewireScripts
</body>
</html>
