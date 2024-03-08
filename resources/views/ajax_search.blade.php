<div id="ajax-search">
    <div class="container_card">
        @foreach ($cars as $car)
        <div class="card">
          <div class="image">
            <img src="{{ asset('uploads/' . $car->img_car) }}" height="150px" />
          </div>
          <div class="content">
            <h2>{{ $car->name_car }}</h2>
            <h2>A Partir de {{ $car->price_car }}dh</h2>
            <div class="size">
              <h3>Size :</h3>
              <span>40</span>
              <span>41</span>
              <span>42</span>
              <span>43</span>
            </div>
            <div class="color">
              <h3>Variation :</h3>
              <span></span>
              <span></span>
              <span><span>
            </div>
            <a href="{{route('car_details', $car->id_car)}}">Buy Now</a>
          </div>
        </div>
        @endforeach
        @endif
      </div>
</div>

