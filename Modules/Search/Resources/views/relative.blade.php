@extends('search::layouts.master')

@section('page-name')
    {{'search relatives'}}
@stop
@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1 class="text-primary">Search Information</h1><hr>     
        <form method="post" action="search" >
        {{csrf_field()}}
            <label for="">What do you want to search :</label>
            <select name="type" id="" class="form-control">
            <option value=""></option>
            <option value="Aunty">Aunties</option>
            <option value="Brother">Brothers</option>
            <option value="Children">Children</option>
            <option value="Husband">Husband</option>
            <option value="Father">Fathers</option>
            <option value="Grandfather">GrandFathers</option>
            <option value="Grandmother">GrandMothers</option>
            <option value="Mother">Mothers</option>
            <option value="Uncle">Uncles</option>
            <option value="Wife">Wives</option>
            </select>
            <label for="">Who do you want to search for :</label>
            <select name="status" id="" class="form-control">
            <option value=""></option>
            <option value="Self">Self</option>
            <option value="Third Party">Third Party</option>
            </select>
            <label for=""></label>
            <input type="submit" value="Search" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@stop
