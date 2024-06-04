<x-app-layout>
    <div class="feedback-container">
     <div class="row">
                <h1 class="auth  {{session('nightmode') ? 'active' : '' }}">contact us</h1>
        </div>
        <div class="row">
                <h4 style="text-align:center">We'd love to hear from you!</h4>
        </div>
           
        <div class=" input-container">
                <div >
                    <div class="styled-input wide">
                        <input type="text" required />
                        <label>Name</label> 
                    </div>
                </div>
                <div >
                    <div class="styled-input">
                        <input type="text" required />
                        <label>Email</label> 
                    </div>
                </div>
                <div >
                    <div class="styled-input" style="float:right;">
                        <input type="text" required />
                        <label>Phone Number</label> 
                    </div>
                </div>
                <div >
                    <div class="styled-input wide">
                        <textarea required></textarea>
                        <label>Message</label>
                    </div>
                </div>
                <div >
                    <div class=" submit-btn">Send Message</div>
                </div>
        </div>
    </div>
    
</x-app-layout>
