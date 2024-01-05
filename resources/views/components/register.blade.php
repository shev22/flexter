<div class="register-form-container" style="display: none">
    <h4>Register</h4>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="full name" value="{{old('name')  }}" required autofocus autocomplete="name" >
        <x-input-error :messages="$errors->get('name')"  />


        <input type="email" name="email" placeholder="email" value="{{ old('email') }}" required autocomplete="username" >
        <x-input-error :messages="$errors->get('email')" />



        <input type="password" name="password" placeholder="password">
        <x-input-error :messages="$errors->get('password')"  />



        <input type="password" name="password_confirmation" placeholder="confirm password">
        <x-input-error :messages="$errors->get('password_confirmation')" />


        <div class="btns">
            <button type="submit">Register</button>
        </div>

    </form>
</div>
