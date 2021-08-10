@extends('layouts.app')
@section('body')
        <section class="faq">
            <div class="container">
                <div class="faq-head">
                    <h4>Important Links</h4>
                    <?php $item = \App\Models\ChartData::where('id',9)->first(); ?>
                    <p>{{$item->description}}
                    </p>
                </div>

                @foreach($items as $item)
                <div class="link-wrap">
                    <h6>{{$item->title}}</h6>

                    <div class="link-box">
                        <?php $links = App\Models\Link::where('link_categories_id', $item->id)->get(); ?>
                        @foreach($links as $li)
                            <div class="link-card">
                            <a href="{{$li->link}}" target="_blank">{{$li->title}}</a>
                            </div>
                        @endforeach

                        {{-- <div class="link-card">
                            <a href="">Plasma Connect  </a>
                        </div>

                        <div class="link-card">
                            <a href="">Vaccines for Nepal </a>
                        </div>

                        <div class="link-card">
                            <a href="">CoVid19-Dashboard </a>
                        </div>

                        <div class="link-card">
                            <a href="">Vaccine- First Dose Registration </a>
                        </div>

                        <div class="link-card">
                            <a href="">Mental Health Helpline </a>
                        </div>

                        <div class="link-card">
                            <a href="">Nepal Telemedicine Helpline </a>
                        </div> --}}
                    </div>
                </div>
                @endforeach

                {{-- <div class="link-wrap">
                    <h6>Other COVID-19 Initiatives</h6>

                    <div class="link-box">
                        <div class="link-card">
                            <a href="">Covid Alliance For Nepal </a>
                        </div>

                        <div class="link-card">
                            <a href="">Covid Connect Nepal</a>
                        </div>

                        <div class="link-card">
                            <a href="">Covid-19 Nepal </a>
                        </div>

                        <div class="link-card">
                            <a href="">Emergency Number- COVID19   </a>
                        </div>

                        <div class="link-card">
                            <a href="">COVID Alliance for Nepal Resources  </a>
                        </div>

                        <div class="link-card">
                            <a href="">Nepal COVID Support  </a>
                        </div>

                        <div class="link-card">
                            <a href="">Rolling Nexus Covid </a>
                        </div>
                    </div>
                </div> --}}

             
            </div>
        </section>

 @endsection