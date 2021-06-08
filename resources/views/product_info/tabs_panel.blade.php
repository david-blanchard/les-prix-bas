<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Livraison</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Garanties</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        {{-- <h2 class='featurette-heading'>
        </h2> --}}
        <p class='lead'>
            {{ $props->description }}
        </p>
        @if($props->featuresCaption !== null)
        <label htmlFor='features'>{{ $props->featuresCaption }} :</label>
        <ul id='features'>
            @foreach ($props->features as $item) 
                <li> {{ $item }} </li>     
            @endforeach
        </ul>
        @endif
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        ...
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        ...
    </div>
</div>
