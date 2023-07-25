@extends('layouts.app')

@section('css')
    <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet" />
    <style type="text/css">
        /* 40128b */


        body {
            background: #57c1e5;
        }


        

        .rotate-phone-text {
            font-family: 'Broken Console', sans-serif;
        }

        .map-container {

            text-align: center;
            position: relative;
            width: 700px;
            height: 417;
            background-color: #57c1e5;
        }

        .map_image {
            width: 700px;
            height: 417px;
        }

        .point {
            position: absolute;
        }

        #ta-bw {
            width: 83px;
            height: auto;
            bottom: 113px;
            left: 289.3px;
        }

        #tb-bw {
            width: 100px;
            height: auto;
            bottom: 143px;
            right: 236px;
        }

        #tc-bw {
            width: 107px;
            height: auto;
            top: 146px;
            right: 139px;
            z-index: 1;
        }

        #td-bw {
            width: 77px;
            height: auto;
            top: 94px;
            right: 146px;
            /* z-index: 1; */
        }

        #te-bw {
            width: 129px;
            height: auto;
            top: 92px;
            right: 233px;
            z-index: 1;
        }

        #tf-bw {
            width: 142px;
            height: auto;
            bottom: 165px;
            left: 205px;
        }

        #tg-bw {
            width: 108px;
            height: auto;
            top: 15px;
            right: 228px;
        }

        .blocker {
            display: none;
        }

        .broken-console {
            font-family: 'Broken Console', sans-serif !important;
        }



        @media screen and (orientation: portrait) {
            .map-section {
                display: none;
            }

            .blocker {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100vw;
                height: 100vh;
                position: fixed;
                top: 0;
                left: 0;
                background-color: #000;
                z-index: 1000;
                color: #ffffff;
            }
        }

        .nes-input {
            width: 400px;
            border-image-repeat: stretch !important;
            background-clip: unset !important;
            border-width: 6px !important;
            height: 40px;

        }

        .nes-dialog.is-rounded, .nes-btn,.nes-textarea {
            border-image-repeat: stretch !important;
        }
        .nes-btn{
            font-family: 'Broken Console', sans-serif !important;
        }

        #dialog-rounded {
            height: 400px;
            overflow-y: auto;
            min-width: 400px;
            max-width: 700px;
            overflow-y: auto; 
        }

        #answer{
            height: 80px;
        }
    </style>
@endsection

@section('content')
    <div class="blocker">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://lottie.host/f0c83d85-3b47-4b77-990c-3245f810b85e/dguz1WhP5f.json" background="#000000"
            speed="1" style="width: 250px; height: 250px" direction="1" mode="normal" loop autoplay></lottie-player>
        <h2 class="rotate-phone-text">Please Rotate Your Phone</h2>
    </div>

    <section class="map-section">
        <h1 class="title">Engineering Tour</h1>
        <div class="container-fluid my-0 my-4">
            <div class="row">
                <div class="col  d-flex justify-content-center">
                    <div class="map-container">
                        <img src="{{ asset('../images/assets_gedung/map_rgb_cropped.png') }}" class="map_image"
                        alt="">
                        @if(!array_search(1,$pos))
                            <img src="{{ asset('../images/assets_gedung/bw/TA_bw.png') }}" alt="" class="point"
                            id="ta-bw">
                        @endif
                        @if(!array_search(2,$pos))
                            <img src="{{ asset('../images/assets_gedung/bw/TB_bw.png') }}" alt="" class="point"
                            id="tb-bw">
                        @endif
                        @if(!array_search(3,$pos))
                            <img src="{{ asset('../images/assets_gedung/bw/TC_bw.png') }}" alt="" class="point"
                            id="tc-bw">
                        @endif
                        @if(!array_search(4,$pos))
                            <img src="{{ asset('../images/assets_gedung/bw/TD_bw.png') }}" alt="" class="point"
                                id="td-bw">
                        @endif
                        @if(!array_search(5,$pos))
                            <img src="{{ asset('../images/assets_gedung/bw/TE_bw.png') }}" alt="" class="point"
                                id="te-bw">
                        @endif
                        @if(!array_search(6,$pos))
                                <img src="{{ asset('../images/assets_gedung/bw/TF_bw.png') }}" alt="" class="point"
                                id="tf-bw">
                        @endif
                        @if(!array_search(7,$pos))
                            <img src="{{ asset('../images/assets_gedung/bw/TG_bw.png') }}" alt="" class="point"
                                id="tg-bw">
                        @endif
                    </div>
                </div>
            </div>

            <div class="row  d-flex justify-content-center">
                <div class="col d-flex justify-content-center">
                    <div class="password-wrapper d-flex justify-content-center">
                        <div class="nes-field">
                            <label for="input-password" class="broken-console">Password: </label>
                            <input type="text" id="input-password" class="nes-input broken-console">
                        </div>
                        <div class="check-section d-flex align-items-end px-3">
                            <button type="button" class="nes-btn is-primary" style="height: " onclick="checkPass()">
                            {{-- document.getElementById('dialog-question').showModal(); --}}
                                Check
                            </button>
                        </div>
                        
                    </div>
                </div>

            </div>

            <section>
                <dialog class="nes-dialog is-rounded" id="dialog-question">
                    {{-- <form method="dialog"> --}}
                        <p class="title" id="titles">Ini Judul</p>
                        <p id="quest">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, soluta eaque? Vero quis aut
                            voluptate. Architecto sequi tempore quos, dolore delectus ipsa unde vel voluptates voluptatem
                            dolor? Corrupti, magni expedita.</p>
                        <textarea id="answer" class="nes-textarea"></textarea>
                        <div class="dialog-menu">
                            <button class="nes-btn" id="back" onclick="back()">Back</button>
                            <button class="nes-btn" id="next" onclick="next()">Next</button>
                            <button class="nes-btn is-primary" id="confirm" onclick="submit()">Confirm</button>
                        </div>
                    {{-- </form> --}}
                </dialog>
            </section>


        </div>
    </section>
@endsection

@section('script')
<script type="text/javascript">
    let questions = []
    let current = 0
    let answers = ['','','']
    let pos = "";

    const checkPass = () => {
        let pass = $('#input-password').val().toUpperCase()
        $.ajax({
            type: 'POST',
            url: '{{ route("check.pass") }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'pass': pass,
            },
            success: function(data) {
                if(data.msg == "GET"){
                    current = 0
                    pos = data.pos
                    alert("You are in " + pos)
                    document.getElementById('dialog-question').showModal()
                    $('#answer').focus()
                    $('#titles').text(pos + " (" + (current+1) + ")" )
                    questions = data.questions
                    $('#quest').text(questions[current])
                    $('#back').attr('disabled', true)
                }else if(data.msg == "INVALID"){
                    $('#input-password').val("")
                    $('#input-password').focus()
                    alert("Sorry, you already finished this section")
                }
                else{
                    $('#input-password').val("")
                    $('#input-password').focus()
                    alert("Oops, wrong password")
                }
            }
        })
    }

    const next = () => {
        $('#answer').focus()
        answers[current] = $('#answer').val()
        if(current != (questions.length - 1)){
            current += 1
            $('#answer').val(answers[current])
            $('#titles').text(pos + " (" + (current+1) + ")")
        }
        $('#quest').text(questions[current])
        if(current != 0){
            $('#back').removeAttr('disabled')
        }else{
            $('#back').attr('disabled', true)
        }

    }

    const back = () => {
        $('#answer').focus()
        answers[current] = $('#answer').val()
        if(current != 0){
            current -= 1
            $('#answer').val(answers[current])
            $('#titles').text(pos + " (" + (current+1) + ")")
        }
        $('#quest').text(questions[current])
        if(current == (questions.length - 1)){
            $('#next').attr('disabled', true)
        }else{
            $('#next').removeAttr('disabled')
        }
        
    }

    const submit = () => {
        if (!confirm("Are you sure?")) return

        answers[current] = $('#answer').val()

        const invalid = answers.includes("");
        if(invalid){
            alert('You have to answer all the questions')
        }else{
            
            let pass = $('#input-password').val().toUpperCase()
            $.ajax({
                type: 'POST',
                url: '{{ route("submit.answers") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                'pass': pass,
                'answers': answers,
            },
            success: function(data) {
                alert(data.msg)
                location.reload()
            }
        })
        }
    }
</script>
@endsection
