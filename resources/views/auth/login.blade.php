<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- FOR SEO -->
    <!-- <meta property='og:title' content='Custom Notion-styled Avatar Icon'/>
    <meta property='og:image' content='./assets/images/link.jpg'/> 
    <meta property='og:description' content='DESCRIPTION OF YOUR SITE'/>
    <meta property='og:url' content='URL OF YOUR WEBSITE'/>
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='627' />
    <meta property="og:type" content='website'/> -->

    <title>Asset Panda</title>

    
    <link rel="icon" href="{{ asset('admin/images/favi.png')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-5.1.3min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/slick-theme.css')}}" />


</head>

<body>

    <section class="login-panel">
        <div class="box">
            <img src="{{ asset('admin/images/brand.png')}}" class="mx-auto mb-3" width="150px">
            <h3 class="m-0">LOGIN HERE</h3>
            
            <small class="text-muted mb-2 ">
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                    {{ Session::get('error')}}
                    </div>
                @endif
            </small>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div> 
                <div class="form-group my-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
            </div> 
                 
            <div class='d-flex justify-content-center mt-2'>
                    <!-- <button class="btn btn-custom mr-2">Sign up</button> -->
                    <button type="submit" class="src-btn px-4">
                        {{ __('Login') }}
                    </button>
            </div>
        </form>
        </div>
    </section>
 
    

    <script src="{{ asset('admin/js/bootstrap@5.1.3bundle.min.js')}}"></script>
    <script src="{{ asset('admin/js/iconify.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
 
</body>

</html>