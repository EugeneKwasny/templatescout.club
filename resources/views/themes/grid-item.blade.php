<div class="card mb-4 shadow-sm border-0">
    <a href="{{$theme->theme_path()}}">
        <img src="{{$theme->screenshot_url}}" class="card-img-top" alt="{{$theme->name}}">
    </a>
    <div class="card-body">
        <a href="{{$theme->theme_path()}}" class="text-dark">
      <h5 class="card-title">{{$theme->name}}</h5>
        </a>

        <div class="row  align-items-center justify-content-between">   
            @if($theme->rating)
                <div class="col-lg">
                    <span class="card-subtitle text-muted small">Rating: {{$theme->rating/20}}/5 | {{$theme->num_ratings}} reviews</span>    
                </div>
            @endif
            <div class="col-lg 
                @if($theme->rating)
                text-lg-right
                @endif">
                <span class="card-subtitle text-muted small">{{$theme->downloaded}} downloads</span>  
            </div>         

        </div>

    </div>
  </div>