<x-app-layout>
    {{-- {{   dd($movie); }}
    <div id="player" class="webtor" />
    <script>
        window.webtor = window.webtor || [];
        window.webtor.push({
            id: 'player',
            magnet: 'magnet:?xt=urn:btih:@{{  }}&dn=Sintel&tr=udp%3A%2F%2Fexplodie.org%3A6969&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Ftracker.empire-js.us%3A1337&tr=udp%3A%2F%2Ftracker.leechers-paradise.org%3A6969&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337&tr=wss%3A%2F%2Ftracker.btorrent.xyz&tr=wss%3A%2F%2Ftracker.fastcast.nz&tr=wss%3A%2F%2Ftracker.openwebtorrent.com&ws=https%3A%2F%2Fwebtorrent.io%2Ftorrents%2F',
            on: function(e) {
                if (e.name == window.webtor.TORRENT_FETCHED) {
                    console.log('Torrent fetched!', e.data);
                }
                if (e.name == window.webtor.TORRENT_ERROR) {
                    console.log('Torrent error!');
                }
            },
            poster: 'https://via.placeholder.com/150/0000FF/808080',
            subtitles: [
                {
                    srclang: 'en',
                    label: 'test',
                    src: 'https://raw.githubusercontent.com/andreyvit/subtitle-tools/master/sample.srt',
                    default: true,
                }
            ],
            lang: 'en',
            i18n: {
                en: {
                    common: {
                        "prepare to play": "Preparing Video Stream... Please Wait...",
                    },
                    stat: {
                        "seeding": "Seeding",
                        "waiting": "Client initialization",
                        "waiting for peers": "Waiting for peers",
                        "from": "from",
                    },
                },
            },
        });
    </script> --}}

    <div class="container">
        <div class="content-container video_player">
            <div class="player_container" >

                
                 {{-- <video controls autoplay width="100%" 
                src="magnet:?xt=urn:btih:{{ $movie['740']['hash'] }}&dn={{ $movie['title'] }}+%5B720p%5D+%5BWEBRip%5D+%5BYTS.MX%5D"></video>   --}}
<video controls src="magnet:?xt=urn:btih:08ada5a7a6183aae1e09d831df6748d566095a10&dn=Sintel" poster="https://via.placeholder.com/150/0000FF/808080" width="100%" data-title="Sintel">
    <track srclang="en" label="test" default src="https://raw.githubusercontent.com/andreyvit/subtitle-tools/master/sample.srt">
</video>
<script src="https://cdn.jsdelivr.net/npm/@webtor/embed-sdk-js/dist/index.min.js" charset="utf-8" async></script>        
            </div>
        </div>
    </div>

</x-app-layout>
