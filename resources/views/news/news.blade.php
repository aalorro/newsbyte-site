
    @extends('theme')

    @section('content')
        @include('universal.search')
        <div class="container">
            <div class="content">
                <h4>{{ $country }}</h4>
                <div class="row lang_select">
                    @if(isset($native))
                        <div class="col-md-6 col-sm-6 col-xs-6 first">
                                <section class="selected">
                                    <a href="{{ URL('/') }}/{{ $region }}/{{ $country }}/{{ $native }}" class="lang">{{ $native }}</a>
                                </section>
                        </div>
                    @endif

                    @if(!empty($eng) || $eng != '')
                    <div class="col-md-6 col-sm-6 col-xs-6 first">
                            <section class="selected">
                                <a href="{{ URL('/') }}/{{ $region }}/{{ $country }}/{{ $eng }}" class="lang">{{ $eng }}</a>
                            </section>
                    </div>
                    @endif
                </div>
                <!--<a href="https://0.freebasics.com/?ref=badges" class="freebasic"><img class="pull-right clearfix" src="{{asset('images/freebasic1.jpg')}}" alt="freebasic" width="100px"/></a>-->

                @foreach($news as $key => $val)
                    <?php
                        $currentLang = $native;
                        //$currentLang = $language;
                        $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
                        //print_r($segments);
                        
                        if(isset($segments['2'])){
                            $currentLang = $segments['2'];
        
                        }
                        if($segments['0'] == 'r'){
                            $currentLang = $native;
                        }

                    ?>
                    <article class="@if($currentLang == 'Arabic' || $currentLang == 'Urdu' || $native == 'Dhivehi'){{ 'text-right' }} @else {{ '' }} @endif" style="padding:20px 0;">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <a href="{{url('/article')}}/{{ $region }}/{{ $val['country'] }}/{{ $val['item_id'] }}/{{ $val['language'] }}" class="a_link">
                                    {{ $val['title'] }}
                                </a>
                            </p>
                        </div>
                        <div class="col-md-3">
                            @if ($val['thumbnail'] != '')
                                <img src="{{ $val['thumbnail'] }}" class="thumbnail img-responsive">
                            @endif
                        </div>
                        <div class="col-md-9">
                            <ul class="list-inline">
                                <li class="news_source">
                                    <?php 
                                        $url = parse_url($val['source']); 
                                            $host = str_replace('www.', '', $url['host']);
                                        if($host == 'feeds.feedburner.com'){
                                            $id = substr($val['source'], strrpos($val['source'], '/') + 1);
                                                $source = explode('?', $id);
                                            echo $source[0];
                                        }else{
                                           echo $host;
                                        }                                
                                    ?>
                                </li>
                                <li class="pull-right">
                                   <?php echo $val['pubdate']; ?>
                                </li>
                            </ul>
                            <p>{!! $val['description'] !!}</p>
                        </div>
                    </div>
                    </article>
                @endforeach
            </div>
        </div>
    @stop


    