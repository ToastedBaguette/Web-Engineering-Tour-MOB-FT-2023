@extends('layouts.app')

@section('css')
    <style type="text/css">
        #rekap-section {
            color: #ffffff;
        }

        .title {
            color: #ffffff;
        }

        .no-soal{
            width: 400px;
        }

        .table-responsive{
            width: 100%;
            max-height: 700px;
        }

        .table{
            width: 8100px;
            
        }

        .table-dark{
            position: sticky;
            top: 0;
        }

    </style>
@endsection

@section('content')
    <section id="rekap-section">
        <div class="header">
            <h1 class="title">Rekap</h1>
        </div>
        <div class="container-fluid px-5">
            <label for="select-team">Nama Kelompok :</label>
            <select name="select-team" id="">
                <option value="">--Pilih Kelompok--</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="">Kelompok {{ $i }}</option>
                @endfor
            </select>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">NRP/Soal</th>
                            @for ($i = 1; $i <= 20; $i++)
                                <th class="no-soal" style="text-align:center">{{ $i }}</th>
                            @endfor

                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @for ($i = 1; $i <= 14; $i++)
                        <tr>
                            <td scope="row">160421023</td>
                            @for ($j = 1; $j <= 20; $j++)
                                <td class="no-soal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro modi aut optio aspernatur deserunt praesentium fugit iste adipisci quo repudiandae, voluptatibus soluta iure ex cupiditate vitae commodi id mollitia repellat! </td>
                            @endfor

                        </tr>
                        @endfor
                        

                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection
