@extends('master.marketmenutest')

@section('content')

 <div class="row">

    <div class="col-md-4 col-md-offset-4">
        <h1>Admin Login</h1>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
               <p>{{$error}}</p>
            @endforeach
        </div>
        @endif

        <form action="{{route('admin.login.submit')}}" method="post">

              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label for ="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
              </div>
            <div class="form-group">

            <button type="submit" class="btn btn-success">Sign In</button>
            <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                    Forgot Your Password?
            </a>
            </div>
            {{  csrf_field()  }}
        </form>
    </div>
  </div>
 </div>

@endsection
