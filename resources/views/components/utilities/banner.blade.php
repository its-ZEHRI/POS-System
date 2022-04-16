@props([
    'title'    => null,
    'subtitle' => null,
    'date'     => null,
])

<div class="container-fluid" {{$attributes}}>
    <div class="card">
        <div class="card-header card-header-primary">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">{{$title}}</h4>
                <h5 class="card-title">{{$date}}</h5>
            </div>
            <p class="card-category">{{$subtitle}}</p>
        </div>
        <div class="card-body">
            {{$slot}}
        </div>
    </div>
</div>
