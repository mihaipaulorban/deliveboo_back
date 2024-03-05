@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4  rounded-3">
    <div class="container  my-5 pr shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="row flex-wrap">
            <div class="col col-lg-6"> 
                <h1 class="fw-bold text-primary">Welcome</h1>

                <p class="fs-4 my-5">welcome to your restaurant management page.</p>

                <button class="btn btn-primary btn-md" type="button">Example button</button>
            </div>
            <div class="col col-lg-6">
                <div class="w-100">
                    {{-- <img  class="img-fluid" src="https://cdn.discordapp.com/attachments/1213127782629113919/1213135927367434281/Immagini_organizzazione.png?ex=65f45fe0&is=65e1eae0&hm=69232915847dc5cea0adbfd9fdc42777bcf11e74251033713555a14fc622fdc6&" alt=""> --}}

                    <div class="box w-100"></div>
                </div>
            </div>
           
        </div>
        
    </div>
</div>

<div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div>
@endsection
