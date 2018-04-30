Hi {{$name}}

<p>Thank you for Creating Account with Us. Please click on the link below to Activate your account.</p>

<p><a href="{{ URL::to('register/verify/'.$hash) }}">{{ URL::to('register/verify/'.$hash) }}</a></p>

<p>Regards</p>

<p>Mokals Team.</p>