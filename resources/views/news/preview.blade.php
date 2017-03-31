
    @extends('theme')

    @section('content')
        <div class="container">
        @foreach($article as $key => $art)
            <div class="preview_news">
                <article>
                    <h4 class="@if($native == 'Arabic' || $native == 'Urdu' || $native == 'Dhivehi'){{ 'text-right' }} @endif">{{ $art['title'] }}</h4>
                    <ul class="list-inline">
                        <li class="news_source">
                                <?php 
                                    $link = $art['link'];
                                    $url = parse_url($art['source']); 
                                        $host = str_replace('www.', '', $url['host']);

                                    if($host == 'feeds.feedburner.com'){
                                        $id = substr($art['source'], strrpos($art['source'], '/') + 1);
                                            $source = explode('?', $id);
                                        echo '<a href='.$link.' target="_blank">'.$source[0].'</a>';
                                    }else{
                                       echo '<a href='.$link.' target="_blank">'.$host.'</a>';
                                    }                                
                                ?>
                        </li>
                        <li class="pull-right">
                           <?php echo $art['pubdate']; ?>
                        </li>
                    </ul>
                    <p class="@if($native == 'Arabic' || $native == 'Urdu' || $native == 'Dhivehi'){{ 'text-right' }} @endif">{!! html_entity_decode(nl2br(e($art['article']))) !!}</p>
                    <br/>
                </article>
                <div class="divider">
                    <span></span><hr/>
                </div>
            </div>
        @endforeach
            <div class="related_news">
                <h4>Related News</h4>
                <hr/>
                @foreach($related as $key => $rel)
                    <article  class="@if($native == 'Arabic' || $native == 'Urdu' || $native == 'Dhivehi'){{ 'text-right' }} @endif">
                        <p >
                            <a href="{{url('/article')}}/{{ $region }}/{{ $rel['country'] }}/{{ $rel['item_id'] }}/{{ $rel['language'] }}">{{ $rel['title'] }}</a>
                        </p>
                        <ul class="list-inline">
                            <li class="news_source">
                                <?php 
                                    $url = parse_url($rel['source']); 
                                        $host = str_replace('www.', '', $url['host']);

                                    if($host == 'feeds.feedburner.com'){
                                        $id = substr($rel['source'], strrpos($rel['source'], '/') + 1);
                                            $source = explode('?', $id);
                                        echo $source[0];
                                    }else{
                                       echo $host;
                                    }                                
                                ?>
                            </li>
                            <li class="pull-right">
                                 <?php echo $rel['pubdate'];?>
                            </li>
                        </ul>
                        <p>{!! $rel['description'] !!}</p>
                    </article>
                @endforeach 
            </div>
        </div>
    @stop