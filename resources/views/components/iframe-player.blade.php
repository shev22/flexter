{{-- <div class="modal">
    <input id="modal" type="checkbox" name="modal" tabindex="1">
    <label for="modal" ><i class="fa fa-play-circle" aria-hidden="true"></i></label>
    <div class="modal__overlay">
      <div class="modal__box">
        <label for="modal">&#10006;</label>

        
       
        <iframe src="https://vidsrc.to/embed/movie/930564" frameborder="0"   allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>


      </div>
    </div>
  </div> --}}


  <div class="modal-frame" style="margin-top:40px; ">
      <div class="modal">
        {{-- <iframe src="https://vidsrc.to/embed/{{$media}}/{{$id}}" frameborder="0"  hight=1000 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen></iframe> --}}
        <iframe src="https://vidsrc.to/embed/{{$media}}/{{$id}}"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

              <button class="modal-close">X</button>
        </div> 
  </div>
  {{-- <div class="modal-overlay"></div> --}}
  
  
