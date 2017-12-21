<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" id="fadeOut">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- <script>
$(document).ready(function(){
    $("button").click(function(){
        $("#fadeOut").fadeOut();
    });
});
</script> -->
