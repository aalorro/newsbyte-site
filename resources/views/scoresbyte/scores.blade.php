
    @extends('theme')

    @section('content')
        @include('scoresbyte.search')
        <div class="container">
            <div class="content">
                <h4>{{ $country }}</h4>
                <div class="row sport_select">
                @foreach($sports as $sport)
                    <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                        <section class="{{ $selectedSport == $sport['sport'] ? 'selected' : '' }}">
                            <a href="{{ URL('/') }}/scoresbyte/{{ $region }}/{{ $country }}/{{ $sport['sport'] }}" class="lang">{{ $sport['sport'] }}</a>
                        </section>
                    </div>
                @endforeach
                </div>

                <!-- <div class="row matches">
                    <div class="row scoreboard col-md-12 col-sm-12 col-xs-12 text-center"><h4>Matches</h4></div>
                </div> -->
                @foreach ($scores as $key => $val)
                    <article class="match">
                        <span class="match-date">{{$val['date']}}</span>
                        <div class="scoreboard home-team {{ ($val['score1'] > $val['score2']) ? 'winner' : 'loser' }}">
                            <div class="score">{{ $val['score1'] }}</div>
                            <div class="team">{{ $val['team1'] }}</div>
                        </div>
                        <div class="scoreboard away-team {{ ($val['score1'] < $val['score2']) ? 'winner' : 'loser' }}">
                            <div class="score">{{ $val['score2'] }}</div>
                            <div class="team">{{ $val['team2'] }}</div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    @stop


    