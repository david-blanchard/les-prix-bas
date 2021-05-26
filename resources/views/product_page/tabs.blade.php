<div class='col-md-7 order-md-2'>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h2 class='featurette-heading'>
                {{ $props->title }}
            </h2>
            <p class='lead'>
            {{ $props->description }}
            </p>

            <label htmlFor='pros'>{{ $props->featuresCaption }} :</label>
            <ul id='pros'>
                @foreach ($props->features as $item) 
                    <li> {{ $item }} </li>     
                @endforeach
            </ul>
            <div class='badge-pill'> {{ $props->price }} </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            ...
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            ...
        </div>
    </div>
</div>
