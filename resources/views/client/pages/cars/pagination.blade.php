<div class="row col-lg-9 col-md-8 col-sm-8">
    @foreach ($cars as $car)
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="trainer-item">
                <div class="image-thumb">
                    @php
                        $firstCarImage = explode(',', $car->image)[0];
                        $imagesLink =
                            $firstCarImage == '' || !file_exists('images/' . $firstCarImage)
                                ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                : asset('images/' . $firstCarImage);
                    @endphp
                    <img src="{{ $imagesLink }}" alt="" class="imgCus" srcset="">

                </div>
                <div class="down-content infoCustom">

                    <div style="display: flex; align-items:center; justify-content:space-between; padding:20px 0px;">

                        <div style="font-weight: 600; font-size:24px">{{ $car->name }}</div>
                        <div style="color: #ed563b;  font-weight:600;font-size:20px;">
                            {{ number_format($car->export_price, 2) }} $
                        </div>
                    </div>


                    <div class="subInfo">
                        <div>Color: {{ $car->color }}</div>
                        <div>Engine size: {{ $car->engine_size }}L</div>
                        <div>Transmission: {{ $car->transmission_type }}</div>
                    </div>
                    <a class="btnViewCar" href="{{ route('client.detail', ['id' => $car->id, 'slug' => $car->slug]) }}">
                        Buy Now
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
