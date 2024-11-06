@extends('Pets.Layout')
@section('style')
    <style>
        .card-form {
            width: 100%;
            max-width: 450px;
            min-height: 20px;
            padding: 20px;
            padding-top: 30px;
            background-color: white;
            border-radius: 5px;
            margin: auto;
            box-shadow: rgba(88, 88, 88, 0.35) 0px 5px 15px;
            margin-top: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
        }

        .header {
            font-size: 27px;
            font-weight: 700;
            background: linear-gradient(45deg, #051937, #004D7A, #008793, #00BF72, #ABEB12);
            background-clip: text;
            color: transparent;
        }

        .frame-preview {
            width: 120px;
            height: 120px;
            margin: auto;
            border-radius: 50%;
            cursor: pointer;
            background-color: rgb(235, 235, 235);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            position: relative;
            transition: ease 0.2s all;
        }

        .frame-preview i {
            font-size: 60px;
            color: white;
            position: absolute;
            z-index: 0;

        }

        .frame-preview:hover {
            transform: scale(1.05);

        }

        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            z-index: 1;
            transition: ease 0.2s all;
        }

        .input-group {
            text-align: start;
            width: 100%;
            display: flex;
            flex-direction: column;
        }



        .input-group label {
            color: #585858;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .input-field {
            padding: 8px 10px;
            border: none;
            outline: solid 1px #cccccc;
            border-radius: 5px;
            color: #2c2c2c;
            font-size: 15px;
        }

        .date-group {
            position: relative;
            border: none;
            border-radius: 5px;
            color: #2c2c2c;
            font-size: 15px;
        }


        .input-date {
            padding: 8px 10px;
            border: none;
            outline: solid 1px #cccccc;
            border-radius: 5px;
            color: #2c2c2c;
            font-size: 15px;
            position: relative;
            cursor: pointer;
        }

        .input-date * {
            cursor: pointer;
        }

        .input-date i {
            position: absolute;
            right: 10px;
            top: 12px;
            font-size: 17px;
            color: #494949;
        }

        .mt-1 {
            margin-top: 10px;
        }

        .button-class {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .button-class button {
            font-size: 18px;
            width: 85px;
            height: 35px;
            background: linear-gradient(45deg, #004D7A, #008793, #00BF72, #ABEB12);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all ease 0.3s;
        }

        .button-class button:hover {
            transform: scale(1.05);
        }

        #map {
            height: 500px;
            width: 100%;
        }

        .leaflet-marker-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .map-field {
            width: 100%;
            max-height: 200px;
            border-radius: 5px;
            position: absolute;
        }

        .map-bg {
            width: 100%;
            height: 200px;
            border-radius: 5px;
            background-color: rgb(236, 236, 236);
            position: relative;
        }

        .loader_bg {
            position: absolute;
            width: 100%;
            height: 200px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader {
            width: 50px;
            padding: 8px;
            aspect-ratio: 1;
            border-radius: 50%;
            background: #25b09b;
            --_m:
                conic-gradient(#0000 10%, #000),
                linear-gradient(#000 0 0) content-box;
            -webkit-mask: var(--_m);
            mask: var(--_m);
            -webkit-mask-composite: source-out;
            mask-composite: subtract;
            animation: l3 1s infinite linear;
        }

        .droupdown-custom {
            position: relative;
        }

        input[type="date"] {
            display: block;
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            min-height: 1.2em;
        }



        .custom-date-input {
            border-radius: 5px;
            background-color: white;
            text-align: start;
            color: #000;
            font-size: 15px;
            outline: solid 1px #cccccc;
            min-width: calc(100% - 20px);
            border: none;
            padding: 8px 10px;
        }

        .gradient-btn {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .gradient-btn:hover {
            background: linear-gradient(to right, #feb47b, #ff7e5f);
        }


        @keyframes l3 {
            to {
                transform: rotate(1turn)
            }
        }

        @media (max-width: 768px) {
            .card-form {
                width: 100%;
                padding: 30px;
                padding-top: 30px;
                background-color: white;
                border-radius: 5px;
                margin: auto;
                box-shadow: rgba(255, 255, 255, 0.35) 0px 5px 15px;
                margin-top: 0px;
                text-align: center;
                display: flex;
                flex-direction: column;
            }

            body {
                padding-bottom: 0px;
            }

        }

        .select-field {
            background-color: white;
            height: 40px;

        }

        .date-field {
            min-width: 100%;
            padding: 0;
            outline: none;
            border: none;
            background-color: white;
            font-size: 15px;
            color: #000;
            margin-top: 1px;
            text-align: left !important;
        }


        .d-none {
            display: none;
        }
    </style>
@section('title')
    Register Pet
@endsection
@endsection
@section('content')
<livewire:pets.first-regster />
@endsection
