@extends('partials.master')
@section('content')
    @include('partials.navbar')
    <div class="container-upper">
        <div class="row">
            <div class="col-sm-12">
                    <div class="Image-frame">
                        @if(isset($user[0]->image)&& file_exists(public_path().'/img/'.$user[0]->image))
                                    <img src="{{asset('img/'.$user[0]->image)}}" width="300" height="300">
                                    <a href="{{url('api/deleteimage/'.$token)}}" id="delete-image">Delete Image</a>
                        @else
                            <form method="post" action="{{url('api/uploadimage/'.$token)}}" enctype="multipart/form-data">
                                <input type="file" accept='image/*' name="image" id="upload-image-file">
                                <input type="submit" value="Upload" class="btn btn-primary" name="image-upload" id="upload-image-button">
                            </form>
                        @endif
                    </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Create time</th>
                        <th>Delete Profile</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$user[0]->name}}</td>
                        <td>{{$user[0]->email}}</td>
                        <td>{{$user[0]->created_at}}</td>
                        <td><a href="{{url('api/deleteProfile/'.$token)}}">Delete Profile</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection