<style>
    #mainSlider .carousel-inner {
        max-height: 600px; /* bạn có thể thay đổi chiều cao tùy ý */
        overflow: hidden;
    }

    #mainSlider .carousel-item img {
        object-fit: cover;
        height: 600px; /* giống với max-height ở trên */
        width: 100%;
    }

    .carousel-caption {
        bottom: 20%;
    }
    header {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 999;
        background-color: white;
    }

    #mainSlider {
        margin-top: 80px;
    }

    #mainSlider .carousel-inner {
        max-height: none;
    }

    #mainSlider .carousel-item img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }

    .carousel-caption {
        bottom: 15%;
        z-index: 1;
    }

    .carousel-caption h1,
    .carousel-caption h6 {
        text-shadow: 0 0 5px rgba(0,0,0,0.5);
    }
</style>

<div id="mainSlider" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('user/assets/images/background1.jpg') }}" class="d-block w-100" alt="Image 1">
            <div class="carousel-caption">
                <h6 style="color: white">Spring / Summer Collection 2025</h6>
                <h1 style="color: yellow">Get up to 30% for loyal customers of Airconditioners</h1>
                <div class="red_button shop_now_button">
                    <a href="{{ route('user.categories') }}">shop now</a>
                </div>
            </div>
        </div>
    <div class="carousel-item">
            <img src="{{ asset('user/assets/images/background2.jpg') }}" class="d-block w-100" alt="Image 2">
            <div class="carousel-caption">
                <h6 style="color: white">Spring / Summer Collection 2025</h6>
                <h1 style="color: yellow">Get up to 30% for loyal customers of Airconditioners</h1>
                <div class="red_button shop_now_button"><a href="{{ route('user.categories') }}">shop now</a></div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('user/assets/images/background3.jpg') }}" class="d-block w-100" alt="Image 3">
            <div class="carousel-caption">
                <h6 style="color: white">Spring / Summer Collection 2025</h6>
                <h1 style="color: yellow">Get up to 30% for loyal customers of Airconditioners</h1>
                <div class="red_button shop_now_button"><a href="{{ route('user.categories') }}">shop now</a></div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('user/assets/images/background4.jpg') }}" class="d-block w-100" alt="Image 4">
            <div class="carousel-caption">
                <h6 style="color: white">Spring / Summer Collection 2025</h6>
                <h1 style="color: yellow">Get up to 30% for loyal customers of Airconditioners</h1>
                <div class="red_button shop_now_button"><a href="{{ route('user.categories') }}">shop now</a></div>
            </div>
        </div>
    </div>
</div> .
    </div>
</div>
