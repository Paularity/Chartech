<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="successCust"><span class="closebtn">&times;</span>{{ Session::get('message') }}</div>
@endif

@if ($errors->any())
    <div class="alertCust">
        <span class="closebtn">&times;</span>
            @foreach ($errors->all() as $error)
            <ul>
              <li>{{ $error }}</li>
            </ul>
            @endforeach
    </div>
@endif

<!-- <script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script> -->

<script>
$(document).ready(function(){
    $(".closebtn").click(function(){
      var div = this.parentElement;
        $(div).fadeOut()
    });
});
</script>
