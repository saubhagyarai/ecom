@if (session()->has('success'))
<div class="alert alert-success">
    <span>
        {{session()->get('success')}}
    </span>
</div>
@elseif ($errors->any())

    @foreach ($errors->all() as $error)
        <div class="alert alert-warning">
            <span>
                {{$error}}
            </span>
        </div>        
    @endforeach

@elseif (session()->has('fail'))
    <div class="alert alert-danger">
        <span>
            {{session()->get('fail')}}
        </span>
    </div>    
@endif