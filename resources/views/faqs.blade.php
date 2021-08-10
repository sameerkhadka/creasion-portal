@extends('layouts.app')
@section('body')
        <section class="faq">
            <div class="container">
                <div class="faq-head">
                    <h4>Frequently Asked Questions</h4>
                    <p>Nepal Relief is an initiative of CREASION for quick disaster response.
                    hrough Nepal Relief, we focus on quick response as a short- term solution 
                    and move towards rehabilitation as a long-term solution to disaster management. 
                    </p>
                </div>

                <div class="faq-wrap">
                    <div class="faq-accordion-content">
                        <ul class="accordion">
                            @foreach($items as $item)
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i><img src="/map-assets/images/caret.png" alt="" /></i>
                                    <label>Q:</label>{{$item->question}}
                                </a>

                                <div class="accordion-content">
                                    {!!$item->answer!!}
                                </div>
                            </li>
                            @endforeach

                            {{-- <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i><img src="/map-assets/images/caret.png" alt="" /></i>
                                    <label>Q:</label>What are the current ongoing projects implemented by Nepal Relief?
                                </a>

                                <div class="accordion-content">
                                    <p>
                                        In response to the COVID-19 pandemic, we have initiated Oxygen for Nepal campaign that primarily caters to the need of oxygen through provisions of oxygen cylinders and oxygen concentrators. We have
                                        already provided over 600 oxygen cylinders and three oxygen concentrators to patients in need. In partnership with civil- society organizations and the private sector, Oxygen for Nepal has also
                                        procured 10 Oxygen Generating Units. Each unit can serve 50 beds and 15 cylinders at the same time, 24 hours a day. That is 650 patients who will receive continuous oxygen at any given time.
                                    </p>

                                    <p>
                                        Along with the provision of these essential resources, we are also involved in the arrangement and distribution of basic safety gear such as gloves, masks, PPEs and sanitizers to the front-line
                                        workers. We have already distributed over 1600 PPE sets to different frontline workers all over Nepal.
                                    </p>

                                    <p>
                                        As part of the COVID-19 intervention, we launched #FeedTheWorkers campaign to help sustain the livelihoods of vulnerable communities of waste worker, daily wage labourers, children and the
                                        differently- abled. Through the campaign, over 1200 ration packages have been distributed in Kathmandu, Lalitpur, Bhaktapur, Nuwakot, Chitwan and Rautahat.
                                    </p>

                                    <p>
                                        As we were dealing with the COVID-19 crisis, the catastrophe caused by the monsoon floods led us to quickly respond through COVID-19 Monsoon Relief campaign. In collaboration with Nepal Share and
                                        other organizations, we have already reached over 500 families in flood-hit areas of Sindhupalchowk and Lamjung with food, medical and safety kit, daily essentials such as mosquito nets, tarpaulins
                                        and solar lamps.
                                    </p>
                                </div>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i><img src="/map-assets/images/caret.png" alt="" /></i>
                                    <label>Q:</label>Why are we doing this and why are we also appealing to you?
                                </a>

                                <div class="accordion-content">
                                    <p>
                                        Because we love our country and its people. And because we believe we can, and should, help to solve the current crisis in whichever little or big way we can. We believe you love Nepal and its people
                                        too and will stand with us at this time.
                                    </p>
                                </div>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i><img src="/map-assets/images/caret.png" alt="" /></i>
                                    <label>Q:</label>Where are the oxygen cylinders and oxygen generating units coming from?
                                </a>

                                <div class="accordion-content">
                                    <p>
                                        We were able to source 11 oxygen generating units from NOVAIR, an ISO 9001 and ISO 13485 certified French manufacturer specialized in the design and manufacture of the medical gas system. For now – 10
                                        of those have been procured. If we are able to bring in more money, we will negotiate the remaining one.
                                    </p>

                                    <p>
                                        As for the oxygen cylinders, we are making the procurements from China. We have already purchased over 300 oxygen cylinders and are in the process of transporting more oxygen cylinders to Nepal.
                                    </p>
                                </div>
                            </li> --}}

                          
                        </ul>
                    </div>
                </div>
            </div>
        </section>

 @endsection