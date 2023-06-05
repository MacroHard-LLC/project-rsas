@extends('master')
@section('title','View Section')
@section('content')

<div class='container m-2'>
    <div class='row'>
        <div class='col'>
            <a href='/home' class='text' role='button'><i class="fa-solid fa-arrow-left"></i> BACK</a>
        </div>
    </div>
</div>

<div class='container text-center mt-5'>
    <div class='row mb-4'>
        <div class='col text'>
            <h1>Select a Grade level</h1>
        </div>
    </div>
    <div class='row justify-content-center'>
        <div class='col-2'>
            <table class='table table-striped table-hover grade-table'>
                <tbody>
                    @for ($i = 7; $i < 11; $i++)
                    <tr>
                        <td><a href='/gradelevels/{{$i}}' role='button'><i class="fa-solid fa-circle icon-baby-blue"></i>&emsp;Grade {{$i}}</a></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
