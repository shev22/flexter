

 <div class="login-form-container " style="display: none"> 
    <h4>Login</h4>
    <form method="POST" action="{{ route('login') }}">
      @csrf
        <input type="text" name="email"  placeholder="email" value="{{ old('email') }}" required autofocus autocomplete="username" >
        <x-input-error :messages="$errors->get('email')"  />
       

        <input type="password"  placeholder="password"   name="password" required autocomplete="current-password" >
        <x-input-error :messages="$errors->get('password')" />
       
      
      <div style="display: flex">
           <input id="remember_me" type="checkbox"  name="remember" class="checkbox">
                <span >{{ __('Remember me') }}</span>
      </div>
           
      @if (Route::has('password.request'))
      <a style="" class="recover">
          {{ __('Recover password') }}
      </a>
       @endif   

        

     <div class="btns">
        <button type="submit">Login</button>
       </div>

   
    </form>
</div> 

