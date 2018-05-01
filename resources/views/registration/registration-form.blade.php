@extends('partials.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="{{url('api/login')}}" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="login_password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="login_errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form id="register-form" action="{{url('api/register')}}" method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="register_email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="register_password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" tabindex="2" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="messages">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('#register-form input[name="register-submit"]').on('click', function(e){
            e.preventDefault();
            var error_html = '';
            var success_html = '';
            $.ajax( {
                type: "POST",
                url: $("#register-form").attr( 'action' ),
                data: $("#register-form").serialize(),
                success: function( response ) {
                    $.each(response, function(key, value) {
                        if(key=="error")
                        {
                            $.each(value, function(key1, value1) {
                                error_html += '<div class="form-group">';
                                error_html += '<div class="alert alert-danger">';
                                error_html += '<h5>' + value1 + '</h5>';
                                error_html += '</div>';
                                error_html += '</div>';
                            });
                            $('#messages').html(error_html);
                        }
                        else
                        {
                            if(value==true)
                            {
                               return;
                            }
                            else
                            {
                                success_html += '<div class="form-group">';
                                success_html += '<div class="alert alert-success">';
                                success_html += '<h5>' + value + '</h5>';
                                success_html += '</div>';
                                success_html += '</div>';
                            }

                            $('#messages').html(success_html);

                        }
                    });
                    //Code to process the response
                },
                error:function ( response ) {
                }
            });
            return false;
        } );

        $('#login-form input[name="login-submit"]').on('click', function(e){
            e.preventDefault();
            var error_html = '';
            $.ajax( {
                type: "POST",
                url: $("#login-form").attr( 'action' ),
                data: $("#login-form").serialize(),

                success: function( response ) {
                    $.each(response, function(key, value) {
                        if(key=="error")
                        {
                            $.each(value, function(key1, value1) {
                                error_html += '<div class="alert alert-danger">';
                                error_html += '<h5>' + value1 + '</h5>';
                                error_html += '</div>';
                            });
                            $('#login_errors').html(error_html);
                        }
                        else
                        {
                            if(value==true)
                            {
                                return;
                            }

                            else
                            {
                                window.localStorage.setItem('token',value.token);
                            }

                            if(window.localStorage.getItem('token') !== null)
                            {
                                location.href = 'api/dashboard/'+window.localStorage.getItem('token');
                            }
                        }
                    });
                },
                error:function ( response )
                {
                        error_html += '<div class="alert alert-danger">';
                        error_html += '<h5>' + response.responseJSON.error + '</h5>';
                        error_html += '</div>';
                        $('#login_errors').html(error_html);

                    window.localStorage.setItem('token',null);

                }
            });
        } );

    </script>
@endsection