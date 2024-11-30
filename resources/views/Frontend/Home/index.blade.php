@extends('Frontend.Shared.layout')

@section('title', 'Home')

@section('css')
    <style>
        .mySwiper {
            width: 100%;
            max-width: 1300px;
            height: auto;
            max-height: 600px;
            aspect-ratio: 3 / 2;
            margin: 0 auto;
            /* Centers horizontally */
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            position: relative;
            /* For positioning the progress indicator */
        }

        swiper-container {
            width: 100%;
            height: 100%;
        }

        swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
        }

        swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .autoplay-progress {
            position: absolute;
            right: 16px;
            bottom: 16px;
            z-index: 10;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--swiper-theme-color);
        }

        .autoplay-progress svg {
            --progress: 0;
            position: absolute;
            left: 0;
            top: 0px;
            z-index: 10;
            width: 100%;
            height: 100%;
            stroke-width: 4px;
            stroke: var(--swiper-theme-color);
            fill: none;
            stroke-dashoffset: calc(125.6px * (1 - var(--progress)));
            stroke-dasharray: 125.6;
            transform: rotate(-90deg);
        }
    </style>
@endsection

@section('content')
    <div class="row w-75 m-auto overflow-hidden">
        <div class="col-md-12">
            @include('Frontend.Projects-Swiper.swiper')
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script>
        const progressCircle = document.querySelector(".autoplay-progress svg");
        const progressContent = document.querySelector(".autoplay-progress span");

        const swiperEl = document.querySelector("swiper-container");
        swiperEl.addEventListener("autoplaytimeleft", (e) => {
            const [swiper, time, progress] = e.detail;
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        });
    </script>
@endsection
