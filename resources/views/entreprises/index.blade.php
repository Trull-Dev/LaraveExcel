<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Excel - Import test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>


        <div class="container">
            <h1 class="m-4 text-center">Importation de fichiers Excel avec Laravel</h1>
            <br />
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    Erreur lors de l'upload<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form method="post" enctype="multipart/form-data" action="{{ url('import') }}" class="row">
                {{ csrf_field() }}
                <div class="form-group m-auto">
                    <div class="d-inline-flex align-items-baseline">
                            <div class="mr-5">
                                <label>Choississez un fichier excel à uploader</label>
                            </div>
                            <div class="ml-5 mr-5">
                                <input type="file" name="fichier" />
                            </div>
                            <div>
                                <input type="submit" name="importer" class="btn btn-primary" value="Importer">
                            </div>

                    </div>
                </div>
            </form>
            <hr>

            <br />
            <div class="panel panel-default container">
                <div class="row d-inline-flex align-items-center">
                    <div class="panel-heading row mr-5">
                        <h3 class="panel-title align-items-center">Index des entreprises</h3>
                    </div>
                    @if(!empty($entreprises))
                        <div class="ml-5 mb-2">
                            <a href="{{url('export')}}" class="btn btn-dark">Tout exporter</a>
                        </div>
                    @endif
                </div>
                <div class="panel-body row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                                @if(!empty($entreprises))
                                    <tr class="text-center text-uppercase">
                                        <th>Numéro</th>
                                        <th>Dénomination</th>
                                        <th>Adresse</th>
                                        <th>Téléphone</th>
                                        <th>Actions</th>
                                    </tr>
                                    @foreach($entreprises as $entreprise)
                                        <tr class="text-center modifiable">
                                            <td>{{ $entreprise->numero }}</td>
                                            <td>{{ $entreprise->denomination }}</td>
                                            <td>{{ $entreprise->adresse }}</td>
                                            <td>{{ $entreprise->telephone }}</td>
                                            <td><a class="update" href="{{url('update')}}" data-id="{{$entreprise->id}}">Modifier</a> | <a class="delete" href="{{url('delete')}}" data-id="{{$entreprise->id}}">Supprimer</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>Pas d'entreprises disponibles</p>
                                @endif

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>

