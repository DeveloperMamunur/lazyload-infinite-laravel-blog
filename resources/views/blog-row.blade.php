@foreach ($blogs as $blog)
    <div class="card mb-3 p-3">
        <div class="card-body bg-dark">
            <div class="text-white pb-5">
                <h2>#{{$blog->id}}. {{$blog->name}}</h2>
                <p>{{$blog->description}}</p>
            </div>
        </div>
    </div>

@endforeach
