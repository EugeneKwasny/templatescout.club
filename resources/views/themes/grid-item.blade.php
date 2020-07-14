<div class="card mb-4 shadow-sm border-0">
    <a href="{{$theme->theme_path()}}">
        <img src="{{$theme->screenshot_url}}" class="card-img-top" alt="{{$theme->name}}">
    </a>
    <div class="card-body">
        <a href="{{$theme->theme_path()}}" class="text-dark">
      <h5 class="card-title">{{$theme->name}}</h5>
        </a>

        <div class="row  align-items-center justify-content-between">   
            <div class="col-lg">
                <a href="{{$theme->theme_path()}}" class="card-link">Free download</a>   
            </div>
            <div class="col-lg text-lg-right">
                <span class="card-subtitle text-muted small">{{$theme->downloaded}} downloads</span>  
            </div>         

        </div>

    </div>
  </div>