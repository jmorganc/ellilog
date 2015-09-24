@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
        <?php if ($flashMessage) {
            echo '<div id="flashMessage" class="' . $flashMessage_status . '">' . $flashMessage . '</div>';
        } ?>
        <div class="row marketing">
            <div class="col-lg-6">
                <h3>Log a thing</h3>
                <form action="/log" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="user_id">User:</label>
                        <select id="user_id" name="user_id" class="form-control">
                        <?php foreach($users as $user) { ?>
                            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="baby_id">User:</label>
                        <select id="baby_id" name="baby_id" class="form-control">
                        <?php foreach($babies as $baby) { ?>
                            <option value="{{$baby->id}}">{{$baby->first_name}} {{$baby->last_name}}</option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thing_id">User:</label>
                        <select id="thing_id" name="thing_id" class="form-control">
                        <?php foreach($things as $thing) { ?>
                            <option value="{{$thing->thing}}">{{$thing->thing}}</option>
                        <?php } ?>
                        </select>
                    </div>

                    <p id="data_box"></p>

                    <label for="notes">Notes:</label>
                    <textarea id="notes" name="notes" class="form-control"></textarea>
                    </p>

                    <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                </form>
            </div>

            <!-- <div class="col-lg-6">
                Other side
            </div> -->
        </div>
@stop