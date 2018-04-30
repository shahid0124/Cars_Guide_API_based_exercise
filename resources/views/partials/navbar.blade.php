    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-lg-12">
                <nav class="nav navbar-default navbar-fixed-top">
                    @if(auth()->check())
                        <li> <a class="pull-left"> Welcome : {{auth()->user()->name}}</a></li>
                        <li><a class="pull-right" href="{{url('api/logout/'.$token)}}">Logout</a></li>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</nav>