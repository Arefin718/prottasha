@extends('layouts.admin-layout')


@section('title', 'Prottasha | Admin')


@section('content')

    <h1>Welcome {{ session()->get('user.name')}}</h1>


   <div class="{{ session()->get('alert')}}">
       <strong>{{ session()->get('type')}}</strong> {{ session()->get('message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">{{ session()->get('button')}}</span>
       </button>
   </div>
<div class="row">
    <div class="dropdown pull-left">
        <label for="sel1">Select Data</label>
        <select class="form-control" id="sel1">
            <option>Weekly</option>
            <option>Monthly</option>
            <option>Yearly</option>

        </select>
    </div>
    <div class="pull-left" id="chartContainer" style="height: 150px; width: 50%;">

    </div>

</div>




@endsection
@section('scripts')

    <script>
        window.onload = function () {
            var options = {
                title: {
                    text: "Sell Report"
                },
                data: [
                    {
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: [
                            { label: "January",  y: 10  },
                            { label: "February", y: 15  },

                        ]
                    }
                ]
            };

            $("#chartContainer").CanvasJSChart(options);

        }

    </script>
    @endsection
