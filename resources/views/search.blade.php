@extends('template.app')
@section('css')
    <link href="{{asset('css/search.css')}}" rel="stylesheet" type="text/css">
    @endsection
@section('content')
    <div class="container-fluid search">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h3 class="h3"> Resultat de rechereche</h3>
            </div>
            @if(count($results)>0)
            <div class="col-xs-12 table-responsive">
                <table class="table">
                    <tr class="th">
                        <th>#N INVENTAIRE</th>
                        <th>#N  SERIE</th>
                        <th>DESIGNATION</th>
                        <th>PRIX</th>
                        <th>DATE D'ACQUISITION</th>
                        <th>SALLE</th>
                        <th>Configuration</th>
                    </tr>
                    @forelse($results as $result)
                        <tr>
                            <td>{{$result->numeroInventaire}}</td>
                            <td>{{$result->numeroSerie}}</td>
                            <td>{{$result->designation}}</td>
                            <td>{{$result->prix}}</td>
                            <td>{{$result->dateAcquisition}}</td>
                            <td>{{$result->salle->salle}}</td>
                            <td><a href="/updateInventaire/{{$result->id}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span> </button></a></td>
                        </tr>
                        @empty
                    @endforelse
                </table>
            </div>
                @else
                <div class="col-xs-12">
                    <div class="alert alert-danger text-center">Aucune resultat</div>
                </div>
            @endif
        </div>
    </div>
    @endsection