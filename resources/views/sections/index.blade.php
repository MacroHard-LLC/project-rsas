@extends('master')
@section('title','View Section')
@section('content')

<div class='container-fluid m-2'>
    <div class='row'>
        <div class='col'>
            <a href='/home' class='text' role='button'><i class="fa-solid fa-arrow-left"></i> BACK</a>
        </div>

        <div class="d-flex justify-content-end dropdown col mx-1">
            <button class="btn-secondary btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                SY {{ $selectedSchoolyear->start_year }} - {{ $selectedSchoolyear->end_year }}
            </button>

            <ul class="dropdown-menu">
                @foreach ($schoolyears as $schoolyear)
                    @if ($schoolyear == $currentSchoolyear)
                        <li><a class="dropdown-item" href="/gradelevels">
                    @else
                        <li><a class="dropdown-item" href="/gradelevels/?sy={{ $schoolyear->id }}">
                    @endif
                    {{ $schoolyear->start_year }} - {{ $schoolyear->end_year }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<div class='container text-center mt-5'>
    @if(count($schoolyears) > 0)
    <div class='row mb-4'>
        <div class='col text'>
            <h1>Select a Grade level</h1>
        </div>
    </div>
    <div class='row justify-content-center'>
        @if(count($sections) > 0)
        <div class='col-2'>
            <table class='table table-striped table-hover grade-table'>
                <tbody>
                    @foreach ($sections->sortBy('grade_level') as $section)
                    <tr>
                        <td>
                            <a href='/gradelevels/{{ $section->grade_level }}/{{ $section->id }}' role='button'>
                                <i class="fa-solid fa-circle icon-baby-blue"></i>&emsp;Grade {{ $section->grade_level }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <h5>No grade levels with sections found.</h5>
        @endif
    </div>
    @else
    <div class='row justify-content-center'>
        <h5>No school years found.</h5>
    </div>
    @endif
</div>

@endsection
