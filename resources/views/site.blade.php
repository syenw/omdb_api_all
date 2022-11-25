<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>OMDB API (ALL)</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    {{-- start container --}}
    <div class="container">
        {{-- start row --}}
        <div class="row">
            {{-- start col --}}
            <div class="col-md-4 col-md-offset-4">
                <h1 style="text-align: center;">OMDB API (ALL)</h1>
                @foreach($errors->all() as $message)
                    <div class="alert alert-warning">
                        {{$message}}
                    </div>
                @endforeach

                {{-- Form open --}}
                {{ Form::open(array('url' => '/site/add', 'class' => 'horizontal-form')) }}
                    <input type="text" name="title" class="form-control" placeholder="Enter Movie Title" />
                    <input type="number" min="1900" max="2099" step="1" value="2000" name="year" class="form-control" placeholder="Enter Movie Year" />
                    <select name="plot" class="form-control">
                        <option value="">--- Choose ---</option>
                        <option value="full">Full</option>
                        <option value="short">Short</option>
                    </select>
                    <button type="submit" name="submit" class="btn btn-md btn-block btn-success">Submit</button>
                {{ Form::close() }}

                <br />
                @if (isset($_POST['submit']))
                    @if ($jsonData['Response'] == 'True')
                    <?php 
                        $data = array(
                            'year' => $jsonData['Year'],
                            'rated' => $jsonData['Rated'],
                            'title' => $jsonData['Title'],
                            'poster' => $jsonData['Poster'],
                            'runtime' => $jsonData['Runtime'],
                            'released' => $jsonData['Released'],
                            
                            'plot' => $jsonData['Plot'],
                            'genre' => $jsonData['Genre'],
                            'writer' => $jsonData['Writer'],
                            'actors' => $jsonData['Actors'],
                            'director' => $jsonData['Director'],
                            'language' => $jsonData['Language'],
        
                            'awards' => $jsonData['Awards'],
                            'country' => $jsonData['Country'],
                            'ratings' => $jsonData['Ratings'],
                            'metascore' => $jsonData['Metascore'],
                            'imdb_votes' => $jsonData['imdbVotes'],
                            'imdb_rating' => $jsonData['imdbRating'],
        
                            'dvd' => $jsonData['DVD'],
                            'type' => $jsonData['Type'],
                            'imdb_id' => $jsonData['imdbID'],
                            'website' => $jsonData['Website'],
                            'box_office' => $jsonData['BoxOffice'],
                            'production' => $jsonData['Production'],
                        );
                    ?>
                    @else
                    <div class="alert alert-warning">
                        <?= isset($jsonData['Error']) ? $jsonData['Error'] : '' ?>
                    </div>
                    @endif
                @endif
            </div>
            {{-- end col --}}
        </div>
        {{-- end row --}}

        {{-- start row --}}
        <div class="row">
            {{-- start col --}}
            <div class="col-md-6">
                {{-- start table-responsive --}}
                <div class="table-responsive">
                    {{-- start table --}}
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 20%;">Poster</td>
                            <td style="width: 1%;">:</td>
                            <td>
                                <button type="button" class="btn btn-info btn-xs" id="btn-poster" data-poster=" {{ isset($data['poster']) ? $data['poster'] : '' }} " data-toggle="modal" data-target="#myModal">
                                    Poster
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Year</td>
                            <td>:</td>
                            <td> {{ isset($data['year']) ? $data['year'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Released</td>
                            <td>:</td>
                            <td> {{ isset($data['released']) ? $data['released'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Rated</td>
                            <td>:</td>
                            <td> {{ isset($data['rated']) ? $data['rated'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Runtime</td>
                            <td>:</td>
                            <td> {{ isset($data['runtime']) ? $data['runtime'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>:</td>
                            <td> {{ isset($data['title']) ? $data['title'] : '' }} </td>
                        </tr>
                    </table>
                    {{-- end table --}}
                </div>
                {{-- end table-responsive --}}
            </div>
            {{-- end col --}}

            {{-- start col --}}
            <div class="col-md-6">
                {{-- start table-responsive --}}
                <div class="table-responsive">
                    {{-- start table --}}
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 20%;">Type</td>
                            <td style="width: 1%;">:</td>
                            <td> {{ isset($data['type']) ? Str::ucfirst($data['type']) : '' }} </td>
                        </tr>
                        <tr>
                            <td>DVD</td>
                            <td>:</td>
                            <td> {{ isset($data['dvd']) ? $data['dvd'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Box Office</td>
                            <td>:</td>
                            <td> {{ isset($data['box_office']) ? $data['box_office'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Production</td>
                            <td>:</td>
                            <td> {{ isset($data['production']) ? $data['production'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>:</td>
                            <td> {{ isset($data['website']) ? $data['website'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>IMDB ID</td>
                            <td>:</td>
                            <td> {{ isset($data['imdb_id']) ? $data['imdb_id'] : '' }} </td>
                        </tr>
                    </table>
                    {{-- end table --}}
                </div>
                {{-- end table-responsive --}}
            </div>
            {{-- end col --}}
        </div>
        {{-- end row --}}

        {{-- start row --}}
        <div class="row">
            {{-- start col --}}
            <div class="col-md-6">
                {{-- start table-responsive --}}
                <div class="table-responsive">
                    {{-- start table --}}
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 20%;">Genre</td>
                            <td style="width: 1%;">:</td>
                            <td> {{ isset($data['genre']) ? $data['genre'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Writer</td>
                            <td>:</td>
                            <td> {{ isset($data['writer']) ? $data['writer'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Director</td>
                            <td>:</td>
                            <td> {{ isset($data['director']) ? $data['director'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Actors</td>
                            <td>:</td>
                            <td> {{ isset($data['actors']) ? $data['actors'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Language</td>
                            <td>:</td>
                            <td> {{ isset($data['language']) ? $data['language'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Plot</td>
                            <td>:</td>
                            <td> {{ isset($data['plot']) ? $data['plot'] : '' }} </td>
                        </tr>
                    </table>
                    {{-- end table --}}
                </div>
                {{-- end table-responsive --}}
            </div>
            {{-- end col --}}

            {{-- start col --}}
            <div class="col-md-6">
                {{-- start table-responsive --}}
                <div class="table-responsive">
                    {{-- start table --}}
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 20%;">Country</td>
                            <td style="width: 1%;">:</td>
                            <td> {{ isset($data['country']) ? $data['country'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Awards</td>
                            <td>:</td>
                            <td> {{ isset($data['awards']) ? $data['awards'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Metascore</td>
                            <td>:</td>
                            <td> {{ isset($data['metascore']) ? $data['metascore'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>IMDB Rating</td>
                            <td>:</td>
                            <td> {{ isset($data['imdb_rating']) ? $data['imdb_rating'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>IMDB Votes</td>
                            <td>:</td>
                            <td> {{ isset($data['imdb_votes']) ? $data['imdb_votes'] : '' }} </td>
                        </tr>
                        <tr>
                            <td>Ratings</td>
                            <td>:</td>
                            <td>
                                <?php
                                    if (isset($data['ratings'])) {
                                        foreach ($data['ratings'] as $key => $value) {
                                ?>
                                    <ul>
                                        <li> {{ $value['Source'] }}: {{ $value['Value'] }} </li>
                                    </ul>
                                <?php
                                        }
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                    {{-- end table --}}
                </div>
                {{-- end table-responsive --}}
            </div>
            {{-- end col --}}
        </div>
        {{-- end row --}}
    </div>
    {{-- end container --}}

    {{-- start modal --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        {{-- start modal-dialog --}}
        <div class="modal-dialog modal-sm" role="document">
            {{-- start modal-content --}}
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0px solid transparent;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" class="img-responsive" id="poster" />
                </div>
            </div>
            {{-- end modal-content --}}
        </div>
        {{-- end modal-dialog --}}
    </div>
    {{-- end modal --}}

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#btn-poster').click(function(){
                var poster = $(this).data('poster')
                $('#poster').attr('src', poster)
                // console.log(poster)
            })
        })
    </script>
</body>
</html>