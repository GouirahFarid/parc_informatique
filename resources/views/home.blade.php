@extends('template.app')
@section('css')
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    @endsection
@section('content')
    <div class="container-fluid home">
        <div class="col-xs-12 text-center">
            <h2 class="noti">NOTIFICATIONS</h2>
        </div>
        <div class="col-xs-12 table-responsive">
            <table class="table">
                <tr class="th">
                    <th>#N INVENTAIRE</th>
                    <th>#N  SERIE</th>
                    <th>DESIGNATION</th>
                    <th>PRIX</th>
                    <th>DATE D'ACQUISITION</th>
                    <th>Problème</th>
                    <th>Configuration</th>

                </tr>
                @forelse($inventaires as $inventaire)
                    <tr>
                        <td>{{$inventaire->numeroInventaire}}</td>
                        <td>{{$inventaire->numeroSerie }}</td>
                        <td>{{$inventaire->designation }}</td>
                        <td>{{$inventaire->prix}}</td>
                        <td>{{ date('Y-m-d', strtotime($inventaire->dateAcquisition ))}}</td>
                        <td><span class=" glyphicon glyphicon-remove"></span> </td>
                        <td><a href="/updateInventaire/{{$inventaire->id}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span> </button></a></td>
                    </tr>
                @empty
                @endforelse
            </table>
        </div>
    </div>
    @endsection