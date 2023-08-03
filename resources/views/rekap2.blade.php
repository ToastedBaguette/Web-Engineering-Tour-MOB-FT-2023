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
            width: 9000px;
            
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
            
            <label for="select-team">Kelompok :</label>
            <select name="select-team" id="select-team" onchange="changeGroup()">
                <option value="" disabled selected>--Pilih Kelompok--</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->group }}">{{ $group->group }}</option>
                @endforeach
            </select>

            <label for="select-student">Mahasiswa :</label>
            <select name="select-student" id="select-student" onchange="changeStudent()">
                <option value="" disabled selected>--Pilih Mahasiswa--</option>
            </select>

        </div>

        <div class="m-5" id="answers">
            
        </div>
    </section>
@endsection

@section('script')
<script type="text/javascript">
    const changeGroup = () => {
        let group = $('#select-team').val()
        $('#select-student').html("<option value='' disabled selected>--Pilih Mahasiswa--</option>")
        
        let answers = document.getElementById('answers')
        answers.innerHTML = ''

        $.ajax({
            type: 'POST',
            url: '{{ route("change.group") }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'group': group,
            },
            success: function(data) {
                data.students.forEach(student => {
                    $("#select-student").append(new Option(student.username + ' - ' + student.name, student.id));
                })
            }
        })
    }

    const changeStudent = () =>{
        let student_id = $('#select-student').val()
        let answers = document.getElementById('answers')
        answers.innerHTML = ''

        let gedungs = ['Gedung TA', 'Gedung TB','Gedung TC','Gedung TD','Gedung TE','Gedung TF','Gedung TG']

        $.ajax({
            type: 'POST',
            url: '{{ route("change.student") }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'student_id': student_id,
            },
            success: function(data) {
                for (i = 1; i <= 35; ++i) {
                    let nomor = i % 5
                    if(i % 5 == 0){
                        nomor = 5
                    }

                    if((i+4) % 5 == 0){
                        $("#answers").append("<h3>" + gedungs[Math.floor(i/5)] + "</h3>")

                    }

                    let valid = false
                    data.answers.forEach(a => {
                        if(a.question_id == i){
                            valid = true
                            $("#answers").append("<p>" + nomor + ". " + a.answer + "</p>")
                        }
                    })

                    if(!valid){
                        $("#answers").append("<p>" + nomor + ". No answer" + "</p>")
                    }
                }


            }
        })
    }
</script>
@endsection