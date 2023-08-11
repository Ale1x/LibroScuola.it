@extends('adozioni.base.layout')

@section('title', 'Seleziona una Classe')

@section('content')

    <div class="container mx-auto px-4 mt-4">
        <div class="flex">
            <input type="text" id="searchInput" onkeyup="filterClasses()" placeholder="Filtra classi" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4" />
            <button class="px-5 py-2 border border-gray-300 rounded-md text-white bg-blue-500 flex items-center">
                <i class="fas fa-filter"></i>
            </button>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4" id="classList">
            @foreach ($classi as $class)
                @php
                    $url = "/libri/" . $scuola->CODICESCUOLA . "/" . $class->ANNOCORSO . $class->SEZIONEANNO;
                @endphp

                <form action="{{ $url }}" method="get">
                    <button type="submit" class="w-full py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-white focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        {{ $class->ANNOCORSO . $class->SEZIONEANNO }}
                    </button>
                </form>
            @endforeach
        </div>
    </div>

@endsection

@section('footer')
    @parent
@endsection

@push('scripts')
    <script>
        function filterClasses() {
            var input, filter, classList, classes, a, i;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            classList = document.getElementById("classList");
            classes = classList.getElementsByTagName('form');

            for (i = 0; i < classes.length; i++) {
                a = classes[i].getElementsByTagName("button")[0];
                if (a) {
                    if (a.textContent.toUpperCase().indexOf(filter) > -1) {
                        classes[i].style.display = "";
                    } else {
                        classes[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endpush
