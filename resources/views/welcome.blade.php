@extends('layouts.app')
@section('content')

<div class="jumbotron p-2 mt-3 rounded-3">
    <div class="container  my-5 shadow p-3 mb-5 bg-body-tertiary rounded">

       {{--container colonne --}}

        <div class="row">

            {{-- colonna 1 con testo --}}

            <div class="col-12 text-center col-md-6"> 
                <h1 class="fw-bold">We're glad to have you with us!</h1>

                {{-- <div class="box-2"></div> --}}

                <div class="container p-3 mt-3">
                <h3>
                    Welcome to your restaurant management page. Here you can register your restaurant, login to your personal page and add food items. 
                </h3>
            </div>

               
            </div>
            {{-- colonna 1 con testo --}}


            {{-- colonna 2 con img e position --}}
            <div class="col-12 col-md-6 pr ">
                <div class="container-img">
                    <img  class=" pr-img" src="https://cdn.discordapp.com/attachments/1213127782629113919/1213135927367434281/Immagini_organizzazione.png?ex=65f45fe0&is=65e1eae0&hm=69232915847dc5cea0adbfd9fdc42777bcf11e74251033713555a14fc622fdc6&" alt="">

                    {{-- <div class="box w-100"></div> --}}
                </div>
            </div>
            {{-- colonna 2 con img e position --}}
           
        </div>

    </div>

    </div>
</div>


@endsection
