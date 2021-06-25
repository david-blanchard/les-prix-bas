<div class="container justify-content-center mt-3" >
    @if($message = Session::get("success"))
    <div class="alert alert-success alerd-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
</div> 
