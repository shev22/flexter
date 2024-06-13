<x-app-layout>
    <div class="feedback-container">


        <div class="row">
            <h1 class="auth  {{ session('nightmode') ? 'active' : '' }}">contact us</h1>
        </div>
        <div class="row">
            <h4 style="text-align:center">We'd love to hear from you!</h4>
        </div>



        <form method="post" action="{{ route('sendEmail') }}">
            @csrf
            <div class=" input-container">
                @if (Session::has('message'))
                    <p class=" {{ Session::get('alert-class') }}"><span
                            style="font-weight: bold">{{ Session::get('message') }}</span></p>
                @endif
                <div>
                    <div class="styled-input wide">
                        <input type="text" name="name" value="{{ old('name') }}" />
                        <label>Name</label>
                        <x-input-error :messages="$errors->get('name')" />

                    </div>

                </div>
                <div>
                    <div class="styled-input">
                        <input type="text" name="email" value="{{ old('email') }}" />
                        <label>Email</label>
                        <x-input-error :messages="$errors->get('email')" />
                    </div>
                </div>
                <div>
                    <div class="styled-input" style="float:right;">
                        <input type="text" name="phone" value="{{ old('phone') }}" />
                        <label>Phone Number</label>
                        <x-input-error :messages="$errors->get('phone')" />
                    </div>
                </div>
                <div>
                    <div class="styled-input wide">
                        <input type="text" name="subject" value="{{ old('subject') }}" />
                        <label>Subject</label>
                        <x-input-error :messages="$errors->get('subject')" />

                    </div>

                </div>
                <div>
                    <div class="styled-input wide">
                        <textarea name="message" value="{{ old('message') }}"></textarea>
                        <label>Message</label>
                        <x-input-error :messages="$errors->get('message')" />
                    </div>
                </div>
                <div>

                    <button class=" submit-btn">
                        Send Message
                    </button>

                </div>
            </div>
        </form>
    </div>

</x-app-layout>
