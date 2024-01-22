<x-app-layout>
    <div class="container ">
        <div class="content-container" data-aos="zoom-in-up">

     <livewire:home-view >
    

        </div>
    </div> 




</x-app-layout>
@if (request()->routeIs('/'))
    <script>
        // $('#exampleSlider').multislider({
        //     duration: 10000,
        //     continuous: true
        // });


        // $('#exampleSlider2').multislider({
        //     interval: 6000,
        //     slideAll: true
        // });

        $('#exampleSlider1').multislider({

            interval: 7000,
            slideAll: true
        });

        // $('#exampleSlider4').multislider({
        //     interval: 6000,
        //     slideAll: true
        // });

        // $('#exampleSlider3').multislider({

        //     interval: 7000,
        //     slideAll: true
        // });
    </script>
@endif
