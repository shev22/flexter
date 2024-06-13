<x-app-layout>

    <div class="feedback-container">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <div class="row">
            <h1 class="auth  {{ session('nightmode') ? 'active' : '' }}">Profile</h1>
        </div>
        <div class="row">
            <h4 style="text-align:center">Update your account's profile information </h4>
        </div>


        <div class=" input-container">
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                <div>
                    <div class="styled-input wide">
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" />
                        <label>Name</label>
                        <x-input-error :messages="$errors->get('name')" />

                    </div>

                </div>
                <div>
                    <div class="styled-input wide">
                        <input type="text" name="email" value="{{ old('name', $user->email) }}" />
                        <label>Email</label>
                        <x-input-error :messages="$errors->get('email')" />
                    </div>
                </div>

                <div>

                    <button class=" submit-btn">
                        Update
                    </button>
                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            style="color: gray">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')


                <div>
                    <div class="styled-input wide">
                        <input name="current_password" type="password" />
                        <label>Current Password</label>
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" autocomplete="current-password" />

                    </div>

                </div>
                <div>
                    <div class="styled-input wide">
                        <input name="password" type="password" />
                        <label>New Password</label>
                        <x-input-error :messages="$errors->updatePassword->get('password')" autocomplete="new-password" />
                    </div>
                </div>
                <div>
                    <div class="styled-input wide">
                        <input name="password_confirmation" type="password" autocomplete="new-password" />
                        <label>Confirm Password</label>
                        <x-input-error :messages="$errors->updatePassword->get('password')" />
                    </div>
                </div>


                <div>

                    <button class=" submit-btn">
                        Update
                    </button>
                    @if (session('status') === 'password-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            style="color: gray">{{ __('Saved.') }}</p>
                    @endif
                </div>

            </form>

            <div>
                <div class="">

                    <button class="delete-profile " x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">Delete Profile</button>

                </div>
                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')



                        <p>
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mt-6">
                            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                                placeholder="{{ __('Password') }}" />

                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

                        <div style="margin-top:8px">
                            <button type="button" x-on:click="$dispatch('close')"
                                style="background:green;border:none;border-radius:3px; padding:5px 10px; font-weight:bold; color:white;">
                                {{ __('Cancel') }}
                            </button>

                            <button type="submit"
                                style="background:#af1d1d;border:none;border-radius:3px; padding:5px 10px; font-weight:bold; color:white;">
                                {{ __('Delete Account') }}
                            </button>
                        </div>
                    </form>
                </x-modal>
            </div>

        </div>

    </div>

</x-app-layout>
