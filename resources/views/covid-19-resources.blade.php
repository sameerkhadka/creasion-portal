@extends('layouts.app')
@section('body')
        <section class="faq">
            <div class="container">
                <div class="faq-head">
                    <h4>Covid-19 Resources</h4>
                </div>


                <section class="resources-wrap">
        
                    <div class="row">
                        @foreach($items as $item)
                        <div class="col-md-3 col-sm-6">
                            <div class="resource-card">
                                <span class="card-hover"></span>
                                @if(json_decode($item->file))
                                <?php $file = (json_decode($item->file))[0]->download_link; ?>	
                                <div class="download-resource"><a href="{{Voyager::image($file)}}" target="_blank"><ion-icon name="download-outline"></ion-icon></a></div>
                                <img src="{{ Voyager::image($item->image) }}" alt=""></a>
                                @else
                                <div class="download-resource"><a href="{{ Voyager::image($item->image) }}" target="_blank"><ion-icon name="download-outline"></ion-icon></a></div>
                                <img src="{{ Voyager::image($item->image) }}" target="_blank" alt="">
                                @endif
                                
                                {{-- <img src="/map-assets/images/covid-resource/1. What to do if family members are covid infected.png" alt=""> --}}
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="col-md-3 col-sm-6">
                            <div class="resource-card">
                                <span class="card-hover"></span>
                                <div class="download-resource"><a href=""><ion-icon name="download-outline"></ion-icon></a></div>
                                <img src="/map-assets/images/covid-resource/10_What to do if you have COVID-19 symptoms_Maithili.png" alt="">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="resource-card">
                                <span class="card-hover"></span>
                                <div class="download-resource"><a href=""><ion-icon name="download-outline"></ion-icon></a></div>
                                <img src="/map-assets/images/covid-resource/10_What to do if you have COVID-19 symptoms_Maithili_2.png" alt="">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="resource-card">
                                <span class="card-hover"></span>
                                <div class="download-resource"><a href=""><ion-icon name="download-outline"></ion-icon></a></div>
                                <img src="/map-assets/images/covid-resource/11_How to treat COVID-19 at home_Maithili.png" alt="">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="resource-card">
                                <span class="card-hover"></span>
                                <div class="download-resource"><a href=""><ion-icon name="download-outline"></ion-icon></a></div>
                                <img src="/map-assets/images/covid-resource/1. What to do if family members are covid infected.png" alt="">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="resource-card">
                                <span class="card-hover"></span>
                                <div class="download-resource"><a href=""><ion-icon name="download-outline"></ion-icon></a></div>
                                <img src="/map-assets/images/covid-resource/10_What to do if you have COVID-19 symptoms_Maithili.png" alt="">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="resource-card">
                                <span class="card-hover"></span>
                                <div class="download-resource"><a href=""><ion-icon name="download-outline"></ion-icon></a></div>
                                <img src="/map-assets/images/covid-resource/10_What to do if you have COVID-19 symptoms_Maithili_2.png" alt="">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="resource-card">
                                <span class="card-hover"></span>
                                <div class="download-resource"><a href=""><ion-icon name="download-outline"></ion-icon></a></div>
                                <img src="/map-assets/images/covid-resource/11_How to treat COVID-19 at home_Maithili.png" alt="">
                            </div>
                        </div> --}}
                    </div>
        
                </section>
            </div>
        </section>

@endsection