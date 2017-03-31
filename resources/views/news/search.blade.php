
    @extends('theme')
   
    @section('content')
        @include('universal.search')
        <section class="search_sec">
            <div class="container">
                <h4>Search Result/s<span></span></h4>
                  @if($result->isEmpty())
                <!-- if none -->
                    <p class="no-result">"No result/s found."</p>
                <!-- if has -->
                @else
                    @foreach($result as $key => $res)
                       <article>
                           <a href="{{url('/article')}}/{{ $region }}/{{ $country }}/{{ $res['item_id'] }}/{{ $res['language'] }}" class="a_link">{!! $res['title'] !!}</a>
                               <ul class="list-inline">
                                   <li class="news_source">
                                      <?php 
                                          $url = parse_url($res['source']); 
                                              $host = str_replace('www.', '', $url['host']);

                                          if($host == 'feeds.feedburner.com'){
                                              $id = substr($res['source'], strrpos($res['source'], '/') + 1);
                                                  $source = explode('?', $id);
                                              echo $host.'/'.$source[0];
                                          }else{
                                             echo $host;
                                          }                                
                                      ?>
                                   </li>
                                   <li class="pull-right">
                                         <?php echo $res['pubdate']; ?>
                                   </li>
                               </ul>
                           <p>{!! $res['description'] !!}</p>
                       </article>
                    @endforeach
                @endif 
            </div>

        </section>
    @stop