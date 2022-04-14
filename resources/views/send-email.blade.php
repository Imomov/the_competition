<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>
                Dear Princess!
            </h3>
            <p>
                Here are the finalists of the first step. Please exclude one of them so the final battle begins.
            </p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Bootstrap Thumbnail First" src="{{ $picture_1 }}" />
                        <div class="card-block">
                            <h4 class="card-title">
                                {{ $name_1 }}, {{ $age_1 }}
                            </h4>
                            <p class="card-text">
                                Courage ({{ $courage_1 }}), Justice  ({{ $justice_1 }}), Mercy  ({{ $mercy_1 }}), Generosity  ({{ $generosity_1 }}), Faith  ({{ $faith_1 }}), Nobility  ({{ $nobility_1 }}), Hope  ({{ $hope_1 }}), Strength  ({{ $strength_1 }}), Defense  ({{ $defense_1 }}) and Battle strategy  ({{ $battle_strategy_1 }})
                            </p>
                            <p>
                                <a class="btn btn-primary" href="<?=env('APP_URL')?>/{{ $hashid_1 }}">Exclude him</a>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Bootstrap Thumbnail Second" src="{{ $picture_2 }}" />
                        <div class="card-block">
                            <h4 class="card-title">
                                {{ $name_2 }}, {{ $age_2 }}
                            </h4>
                            <p class="card-text">
                                Courage ({{ $courage_2 }}), Justice  ({{ $justice_2 }}), Mercy  ({{ $mercy_2 }}), Generosity  ({{ $generosity_2 }}), Faith  ({{ $faith_2 }}), Nobility  ({{ $nobility_2 }}), Hope  ({{ $hope_2 }}), Strength  ({{ $strength_2 }}), Defense  ({{ $defense_2 }}) and Battle strategy  ({{ $battle_strategy_2 }})
                            </p>
                            <p>
                                <a class="btn btn-primary" href="<?=env('APP_URL')?>/{{ $hashid_2 }}">Exclude him</a>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Bootstrap Thumbnail Third" src="{{ $picture_3 }}" />
                        <div class="card-block">
                            <h4 class="card-title">
                                {{ $name_3 }}, {{ $age_3 }}
                            </h4>
                            <p class="card-text">
                                Courage ({{ $courage_3 }}), Justice  ({{ $justice_3 }}), Mercy  ({{ $mercy_3 }}), Generosity  ({{ $generosity_3 }}), Faith  ({{ $faith_3 }}), Nobility  ({{ $nobility_3 }}), Hope  ({{ $hope_3 }}), Strength  ({{ $strength_3 }}), Defense  ({{ $defense_3 }}) and Battle strategy  ({{ $battle_strategy_3 }})
                            </p>
                            <p>
                                <a class="btn btn-primary" href="<?=env('APP_URL')?>/{{ $hashid_3 }}">Exclude him</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
