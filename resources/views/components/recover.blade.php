<div class="recover-form-container" style="display: none">
    <h4>Recover Password</h4>

    <p style="font-size: 13px; margin-bottom:3px">
    Request password reset link .
    </p>

    <form class="login-form">
        <input type="email" name="email" placeholder="email address">
        <x-input-error :messages="$errors->get('email')"  />
        <div class="btns">
            <a type="submit" href="{{ route('password.request') }}" > Password Reset Link</a>
        </div>

    </form>
</div>
