<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}" class="row">
                {{ csrf_field() }}
                <div class="form-group m-auto">
                    <div class="d-inline-flex align-items-baseline">
                            <div class="mr-5">
                                <label>Choississez un fichier excel à uploader</label>
                            </div>
                            <div class="ml-5 mr-5">
                                <input type="file" name="select_file" />
                            </div>
                            <div class="">
                                <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                            </div>

                    </div>
                </div>
            </form>

            <br />
            <div class="panel panel-default container">
                <div class="panel-heading row">
                    <h3 class="panel-title align-items-center">Index des entreprises</h3>
                </div>
                <div class="panel-body row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                                @if(!empty($entreprises))
                                    <tr>
                                        <th>Numéro</th>
                                        <th>Dénomination</th>
                                        <th>Adresse</th>
                                        <th>Téléphone</th>
                                    </tr>
                                    @foreach($entreprises as $entreprise)
                                        <tr>
                                            <td>{{ $entreprise->numero }}</td>
                                            <td>{{ $entreprise->denomination }}</td>
                                            <td>{{ $entreprise->adresse }}</td>
                                            <td>{{ $entreprise->telephone }}</td>
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
    </body>
</html>

