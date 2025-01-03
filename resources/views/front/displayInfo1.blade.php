@inject('DateRewrite', 'App\Tools\DateRewrite')
@inject('Globals', 'App\Tools\Globals')

@section('content')
    <div class="container">
        @if($title)
            {!! $title !!} <!-- Display the title if it exists -->
        @endif

        @if($Information)
        @php
            $data = json_decode($Information, true);
            $Information = $data[0];
        @endphp
            <div class="row">
                <div class="information-item">
                    <!-- Information details -->
                    <h2>{{ $Information->libele }}</h2>
                    <p>Date de Communication: {{ $Information->dateCommunication }}</p>
                    
                    
                    <!-- Document details -->
                 
                </div>
            </div>
        @else
            @if($noFind)
                {!! $noFind !!} <!-- Display no results message -->
            @endif
        @endif
    </div>
@endsection
