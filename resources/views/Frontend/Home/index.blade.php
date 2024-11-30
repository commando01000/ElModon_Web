@extends('Frontend.Shared.layout')

@section('title', 'Home')

@section('css')
    <style>
        .ad {
            font-family: "Edu AU VIC WA NT Arrows", cursive;
            color: white;
            background-color: rgb(26, 137, 36);
            width: 110%;
            border-radius: 5px;
            clip-path: polygon(0 0, 100% 13%, 90% 100%, 0 100%);
            border-radius: 5px;
            font-size: 40px;
        }

        p3 {
            font-family: Caveat;
            color: rgb(67, 60, 60);
            font-size: 40px;
            width: 65%;
            border-radius: 5px;

        }

        .top {
            background-color: white;
            border-radius: 5px;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
            gap: 5px;
            box-shadow: 0 4px 8px rgb(66, 175, 75);
            border: 1px none #cccccc;
            width: 40%;

        }

        .mySwiper {
            width: 100%;
            max-width: 1300px;
            height: auto;
            max-height: 500px;
            aspect-ratio: 3 / 2;
            margin: 0 auto;
            background: white;
            box-shadow: 0 4px 6px rgb(66, 175, 75);
            border-radius: 15px;
            position: relative;


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

        h5 {
            color: black;
            font-family: "Lora";
            font-size: 15px;
            margin-left: 200px;

        }

        .line-horizontal {
            border: none;
            border-top: 2px solid rgb(59, 150, 67);
            width: 100%;
        }

        .im {

            box-shadow: 0 4px 6px rgb(66, 175, 75);

            border-radius: 10px;

        }
    </style>
@endsection

@section('content')
    <br>
    <div class ='top m-auto overflow-hidden text-center'>
        <div class="ad animate__animated animate__backInLeft m-auto overflow-hidden">
            <p1 class=" m-auto overflow-hidden">
                EL
            </p1>
            <p2 class=" m-auto overflow-hidden">
                MODON
            </p2>
        </div>
        <p3 class ='m-auto overflow-hidden text-center animate__animated animate__backInRight '>
            Fundation
        </p3>
    </div>
    <div class="row w-75 m-auto overflow-hidden">
        <div class="col-md-12">

            @include('Frontend.Projects-Swiper.swiper')

            <div class ='animate__animated animate__backInLeft'>
                <div class="row mt-4 pt-4">
                    <h5 class ='m-auto overflow-hidden fa fa-users'>
                        MEET OUR TEAM
                        <hr class="line-horizontal">
                    </h5>
                    <div class="im col-md-4 mb-4">
                        <img src="{{ asset('assets/images/demo1.png') }}" alt="d1" class="img-fluid">
                        <p>d1</p>
                    </div>
                    <div class="im col-md-4 mb-4">
                        <img src="{{ asset('assets/images/demo2.png') }}" alt="d2" class="img-fluid">
                        <p>d2</p>
                    </div>
                    <div class="im col-md-4 mb-4">
                        <img src="{{ asset('assets/images/demo3.png') }}" alt="d3" class="img-fluid">
                        <p>d3</p>
                    </div>
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
