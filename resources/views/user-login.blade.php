<script type="text/javascript">
    function back(){
        window.location.href = '/';
    }
</script>

@include('star-dash-partials.head', ['title' => 'HUB - Login'])
    <div class="content-wrapper" style="min-height: 100vh">
        <div class="card" style="margin-top: 20vh; margin-left: 35vw; height: 50vh; width: 50vh">
            <div class="card-body">
                <div class="card-title">
                    <h2>Login</h2>
                </div>
                <div class="card-description">
                    Login to Continue
                </div>
                <form action="/loginUser" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" name="email" id="" class="form-control">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                        @error('password')
                            {{$message}}
                        @enderror
        <div>

                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-secondary mx-2" onclick="back()">Back</button>
                </form>
            </div>
        </div>
    </div>
@include('star-dash-partials.foot-n-plugins')
