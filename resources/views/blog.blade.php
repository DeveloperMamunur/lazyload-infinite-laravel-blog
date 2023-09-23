<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lazy Load Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="bg-dark">
        <div class="container">
            <h1 class="text-white py-3">laravel lazy load Post</h1>
        </div>
        <div class="container" id="blogs-wrapper">
            @if ($blogs->isNotEmpty())
                @foreach ($blogs as $blog)
                    <div class="card mt-3 p-3">
                        <div class="card-body bg-dark">
                            <div class="text-white pb-5">
                                <h2>#{{$blog->id}}. {{$blog->name}}</h2>
                                <p>{{$blog->description}}</p>
                            </div>

                        </div>

                    </div>
                @endforeach
            @endif
        </div>
    </div>
</body>
</html>
<script src="{{ asset('jQuery-v3.6.4.js')}}"></script>
<script src="{{ asset('jscroll.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
		let page = 2;
        $(document).ready(function(){

            let lastPage = {{ $blogs->lastPage() }}
            $(window).scroll(function(){
                if($(window).scrollTop() + $(window).height() >= $(document).height() - 100){
                    // alert($(window).scrollTop());
                    if(lastPage >= page){
                        loadMoreData(page);
                        page++;
                    }
                }
            });
            function loadMoreData(page){
                $.ajax({
                    url: '{{ route('blogs.get_blogs') }}',
                    type: 'get',
                    data: { page:page },
                    dataType: 'json',
                    success: function(response){
                        console.log(response);

                        if(response["status"] == true){
                            $("#blogs-wrapper").append(response["html"]);
                        }
                    }
                });
            }
        });
    </script>
