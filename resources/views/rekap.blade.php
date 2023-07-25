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
            <select name="select-team" id="select-team" onchange="changeGroup()">
                @foreach ($groups as $group)
                    <option value="{{ $group }}">{{ $group }}</option>
                @endforeach
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
                        @foreach ($students as $student)
                        <tr>
                            <td scope="row">{{ $student->username }}</td>
                            @php
                                $counter = 1;    
                            @endphp
                            @foreach ($student->answers as $ans)
                                @while($ans->pivot->question_id != $counter) 
                                    <td class="no-soal"></td>
                                    @php
                                        $counter += 1;    
                                    @endphp
                                @endwhile
                                <td class="no-soal">{{ $ans->pivot->answer}}</td>
                                @php
                                    $counter += 1;    
                                @endphp
                            @endforeach
                            @while($counter != 21) 
                                <td class="no-soal"></td>
                                @php
                                    $counter += 1;    
                                @endphp
                            @endwhile
                        </tr>
                        @endforeach
                        

                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection

@section('script')
<script type="text/javascript">
    const changeGroup = () => {
        let a = $('#select-team').val()
        
    }
</script>
@endsection
